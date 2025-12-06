<?php

namespace App\Livewire\Admin\Payments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Payment;
use App\Models\Member;

class PaymentsList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';
    public string $year = '';

    public bool $showModal = false;
    public ?int $editingId = null;
    public string $member_id = '';
    public string $amount = '';
    public string $payment_year = '';
    public string $payment_date = '';
    public string $payment_method = '';
    public string $payment_status = 'pending';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'year' => ['except' => ''],
    ];

    public function mount()
    {
        $this->year = (string) now()->year;
        $this->payment_year = (string) now()->year;
    }

    public function openModal($id = null)
    {
        $this->resetValidation();

        if ($id) {
            $payment = Payment::findOrFail($id);
            $this->editingId = $id;
            $this->member_id = $payment->member_id;
            $this->amount = $payment->amount;
            $this->payment_year = $payment->year;
            $this->payment_date = $payment->payment_date?->format('Y-m-d');
            $this->payment_method = $payment->payment_method ?? '';
            $this->payment_status = $payment->status;
        } else {
            $this->reset(['editingId', 'member_id', 'amount', 'payment_date', 'payment_method']);
            $this->payment_year = (string) now()->year;
            $this->payment_status = 'pending';
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'payment_year' => 'required|integer|min:2000|max:2100',
            'payment_status' => 'required|in:pending,paid,overdue',
        ], [
            'member_id.required' => 'Изберете член.',
            'amount.required' => 'Сумата е задължителна.',
        ]);

        $data = [
            'member_id' => $this->member_id,
            'amount' => $this->amount,
            'year' => $this->payment_year,
            'status' => $this->payment_status,
            'payment_method' => $this->payment_method ?: null,
            'payment_date' => $this->payment_status === 'paid' ? ($this->payment_date ?: now()) : null,
        ];

        if ($this->editingId) {
            Payment::where('id', $this->editingId)->update($data);
            session()->flash('message', 'Плащането е обновено.');
        } else {
            Payment::create($data);
            session()->flash('message', 'Плащането е добавено.');
        }

        $this->closeModal();
    }

    public function markAsPaid(Payment $payment)
    {
        $payment->update([
            'status' => 'paid',
            'payment_date' => now(),
        ]);
        session()->flash('message', 'Плащането е отбелязано като платено.');
    }

    public function render()
    {
        $payments = Payment::query()
            ->with('member')
            ->when($this->search, function ($query) {
                $query->whereHas('member', function ($q) {
                    $q->where('company_name', 'like', "%{$this->search}%");
                });
            })
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->year, fn($q) => $q->where('year', $this->year))
            ->latest()
            ->paginate(15);

        $members = Member::active()->orderBy('company_name')->get();
        $years = range(now()->year, now()->year - 10);

        return view('livewire.admin.payments.payments-list', [
            'payments' => $payments,
            'members' => $members,
            'years' => $years,
        ])->layout('layouts.admin');
    }
}
