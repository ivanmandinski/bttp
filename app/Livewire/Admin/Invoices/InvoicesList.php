<?php

namespace App\Livewire\Admin\Invoices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoice;
use App\Models\Member;

class InvoicesList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';
    public string $year = '';

    public bool $showModal = false;
    public ?int $editingId = null;
    public string $member_id = '';
    public string $issue_date = '';
    public string $due_date = '';
    public string $invoice_status = 'draft';
    public string $payment_method = '';
    public string $notes = '';
    public float $vat_rate = 20;
    public array $items = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'year' => ['except' => ''],
    ];

    public function mount()
    {
        $this->year = (string) now()->year;
        $this->issue_date = now()->format('Y-m-d');
        $this->due_date = now()->addDays(14)->format('Y-m-d');
        $this->items = [['description' => '', 'quantity' => 1, 'unit_price' => 0]];
    }

    public function openModal($id = null)
    {
        $this->resetValidation();

        if ($id) {
            $invoice = Invoice::findOrFail($id);
            $this->editingId = $id;
            $this->member_id = $invoice->member_id ?? '';
            $this->issue_date = $invoice->issue_date->format('Y-m-d');
            $this->due_date = $invoice->due_date?->format('Y-m-d') ?? '';
            $this->invoice_status = $invoice->status;
            $this->payment_method = $invoice->payment_method ?? '';
            $this->notes = $invoice->notes ?? '';
            $this->vat_rate = $invoice->vat_rate;
            $this->items = $invoice->items ?? [['description' => '', 'quantity' => 1, 'unit_price' => 0]];
        } else {
            $this->reset(['editingId', 'member_id', 'payment_method', 'notes']);
            $this->issue_date = now()->format('Y-m-d');
            $this->due_date = now()->addDays(14)->format('Y-m-d');
            $this->invoice_status = 'draft';
            $this->vat_rate = 20;
            $this->items = [['description' => '', 'quantity' => 1, 'unit_price' => 0]];
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function addItem()
    {
        $this->items[] = ['description' => '', 'quantity' => 1, 'unit_price' => 0];
    }

    public function removeItem($index)
    {
        if (count($this->items) > 1) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
        }
    }

    public function prefillFromMember()
    {
        if ($this->member_id) {
            $member = Member::with('category')->find($this->member_id);
            if ($member && $member->category) {
                $this->items = [[
                    'description' => 'Членски внос за ' . now()->year . ' г.',
                    'quantity' => 1,
                    'unit_price' => $member->category->annual_fee,
                ]];
            }
        }
    }

    public function getSubtotalProperty(): float
    {
        return collect($this->items)->sum(fn($item) => ($item['quantity'] ?? 0) * ($item['unit_price'] ?? 0));
    }

    public function getVatAmountProperty(): float
    {
        return $this->subtotal * ($this->vat_rate / 100);
    }

    public function getTotalProperty(): float
    {
        return $this->subtotal + $this->vatAmount;
    }

    public function save()
    {
        $this->validate([
            'member_id' => 'nullable|exists:members,id',
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:issue_date',
            'invoice_status' => 'required|in:draft,issued,paid,cancelled',
            'vat_rate' => 'required|numeric|min:0|max:100',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string|max:500',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit_price' => 'required|numeric|min:0',
        ], [
            'issue_date.required' => 'Датата на издаване е задължителна.',
            'items.required' => 'Добавете поне един ред.',
            'items.*.description.required' => 'Описанието е задължително.',
        ]);

        $member = $this->member_id ? Member::find($this->member_id) : null;

        $data = [
            'member_id' => $this->member_id ?: null,
            'issue_date' => $this->issue_date,
            'due_date' => $this->due_date ?: null,
            'status' => $this->invoice_status,
            'payment_method' => $this->payment_method ?: null,
            'notes' => $this->notes ?: null,
            'vat_rate' => $this->vat_rate,
            'items' => $this->items,
            'subtotal' => $this->subtotal,
            'vat_amount' => $this->vatAmount,
            'total' => $this->total,
            'client_name' => $member?->company_name,
            'client_eik' => $member?->eik,
            'client_address' => $member?->address,
            'client_mol' => $member?->representative_name,
        ];

        if ($this->editingId) {
            Invoice::where('id', $this->editingId)->update($data);
            session()->flash('message', 'Фактурата е обновена.');
        } else {
            $data['invoice_number'] = Invoice::generateNextNumber();
            Invoice::create($data);
            session()->flash('message', 'Фактурата е създадена.');
        }

        $this->closeModal();
    }

    public function markAsPaid(Invoice $invoice)
    {
        $invoice->update(['status' => 'paid']);
        session()->flash('message', 'Фактурата е отбелязана като платена.');
    }

    public function cancelInvoice(Invoice $invoice)
    {
        $invoice->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);
        session()->flash('message', 'Фактурата е анулирана.');
    }

    public function render()
    {
        $invoices = Invoice::query()
            ->with('member')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('invoice_number', 'like', "%{$this->search}%")
                      ->orWhere('client_name', 'like', "%{$this->search}%")
                      ->orWhere('client_eik', 'like', "%{$this->search}%");
                });
            })
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->year, fn($q) => $q->whereYear('issue_date', $this->year))
            ->latest()
            ->paginate(15);

        $members = Member::active()->orderBy('company_name')->get();
        $years = range(now()->year, now()->year - 10);

        return view('livewire.admin.invoices.invoices-list', [
            'invoices' => $invoices,
            'members' => $members,
            'years' => $years,
        ])->layout('layouts.admin');
    }
}
