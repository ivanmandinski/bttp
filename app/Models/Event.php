<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'location',
        'type',
        'image',
        'max_participants',
        'price',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now())
            ->orderBy('start_date');
    }

    public function scopePast($query)
    {
        return $query->where('start_date', '<', now())
            ->orderByDesc('start_date');
    }

    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'seminar' => 'Семинар',
            'conference' => 'Конференция',
            'training' => 'Обучение',
            'meeting' => 'Среща',
            'other' => 'Друго',
            default => $this->type,
        };
    }

    public function isFree(): bool
    {
        return is_null($this->price) || $this->price == 0;
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->isFree()) {
            return 'Безплатно';
        }

        return number_format($this->price, 2) . ' лв.';
    }
}
