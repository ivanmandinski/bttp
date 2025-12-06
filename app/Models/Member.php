<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $fillable = [
        'company_name',
        'eik',
        'address',
        'phone',
        'email',
        'website',
        'logo',
        'description',
        'representative_name',
        'representative_position',
        'representative_phone',
        'representative_email',
        'membership_category_id',
        'member_since',
        'status',
        'main_activity',
        'nace_code',
        'show_in_catalog',
    ];

    protected $casts = [
        'member_since' => 'date',
        'show_in_catalog' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(MembershipCategory::class, 'membership_category_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInCatalog($query)
    {
        return $query->where('show_in_catalog', true);
    }

    public function getCurrentYearPaymentStatus(): string
    {
        $payment = $this->payments()
            ->where('year', now()->year)
            ->first();

        if (!$payment) {
            return 'pending';
        }

        return $payment->status;
    }

    public function hasPaidForYear(int $year): bool
    {
        return $this->payments()
            ->where('year', $year)
            ->where('status', 'paid')
            ->exists();
    }
}
