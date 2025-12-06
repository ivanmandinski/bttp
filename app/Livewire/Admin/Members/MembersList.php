<?php

namespace App\Livewire\Admin\Members;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member;
use App\Models\MembershipCategory;

class MembersList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';
    public string $category = '';
    public string $paymentStatus = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Member $member)
    {
        $member->delete();
        session()->flash('message', 'Членът е изтрит успешно.');
    }

    public function render()
    {
        $members = Member::query()
            ->with('category')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('company_name', 'like', "%{$this->search}%")
                        ->orWhere('eik', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->category, fn($q) => $q->where('membership_category_id', $this->category))
            ->latest()
            ->paginate(15);

        $categories = MembershipCategory::active()->ordered()->get();

        return view('livewire.admin.members.members-list', [
            'members' => $members,
            'categories' => $categories,
        ])->layout('layouts.admin');
    }
}
