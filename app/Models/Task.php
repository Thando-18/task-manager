<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public const STATUSES = [
        'pending'     => 'Pending',
        'in_progress' => 'In Progress',
        'completed'   => 'Completed',
    ];

    protected $fillable = ['title', 'description', 'due_date', 'status'];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function getIsOverdueAttribute(): bool
    {
        return $this->status !== 'completed' && $this->due_date->isPast() && ! $this->due_date->isToday();
    }
}
