<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Invoice;
use App\Models\MembershipCategory;

class Dashboard extends Component
{
    public function render()
    {
        $currentYear = now()->year;

        // Member stats
        $totalMembers = Member::count();
        $activeMembers = Member::active()->count();

        // Payment stats for current year
        $paidCount = Payment::forYear($currentYear)->paid()->count();
        $pendingCount = Payment::forYear($currentYear)->pending()->count();
        $overdueCount = Payment::forYear($currentYear)->overdue()->count();

        // Revenue
        $totalRevenue = Payment::forYear($currentYear)->paid()->sum('amount');

        // Recent members
        $recentMembers = Member::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Recent payments
        $recentPayments = Payment::with('member')
            ->paid()
            ->latest('payment_date')
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'totalMembers' => $totalMembers,
            'activeMembers' => $activeMembers,
            'paidCount' => $paidCount,
            'pendingCount' => $pendingCount,
            'overdueCount' => $overdueCount,
            'totalRevenue' => $totalRevenue,
            'recentMembers' => $recentMembers,
            'recentPayments' => $recentPayments,
            'currentYear' => $currentYear,
        ])->layout('layouts.admin');
    }
}
