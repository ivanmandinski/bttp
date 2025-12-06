<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'issue_date',
        'due_date',
        'member_id',
        'client_name',
        'client_eik',
        'client_address',
        'client_mol',
        'items',
        'subtotal',
        'vat_rate',
        'vat_amount',
        'total',
        'payment_method',
        'status',
        'notes',
        'cancelled_at',
        'cancellation_reason',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'cancelled_at' => 'date',
        'items' => 'array',
        'subtotal' => 'decimal:2',
        'vat_rate' => 'decimal:2',
        'vat_amount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeIssued($query)
    {
        return $query->where('status', 'issued');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'draft' => 'Чернова',
            'issued' => 'Издадена',
            'paid' => 'Платена',
            'cancelled' => 'Анулирана',
            default => $this->status,
        };
    }

    public static function generateNextNumber(): string
    {
        $year = now()->year;
        $lastInvoice = self::whereYear('issue_date', $year)
            ->orderByDesc('invoice_number')
            ->first();

        if ($lastInvoice) {
            $lastNumber = (int) substr($lastInvoice->invoice_number, -6);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        return $year . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
    }

    public function calculateTotals(): void
    {
        $subtotal = 0;
        foreach ($this->items as $item) {
            $subtotal += $item['quantity'] * $item['unit_price'];
        }

        $this->subtotal = $subtotal;
        $this->vat_amount = $subtotal * ($this->vat_rate / 100);
        $this->total = $subtotal + $this->vat_amount;
    }
}
