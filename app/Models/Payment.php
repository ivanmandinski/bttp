<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'member_id',
        'invoice_id',
        'year',
        'amount',
        'payment_date',
        'payment_method',
        'status',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
        'year' => 'integer',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', 'overdue');
    }

    public function scopeForYear($query, int $year)
    {
        return $query->where('year', $year);
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'paid' => 'Платено',
            'pending' => 'Очаква плащане',
            'overdue' => 'Просрочено',
            default => $this->status,
        };
    }

    public function getPaymentMethodLabelAttribute(): string
    {
        return match($this->payment_method) {
            'bank_transfer' => 'Банков превод',
            'cash' => 'В брой',
            'online' => 'Онлайн',
            default => $this->payment_method ?? '-',
        };
    }
}
