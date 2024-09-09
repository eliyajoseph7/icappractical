<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'user_id'
    ];

    public static $statuses = [
        'pending',
        'on-progress',
        'completed'
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function scopeSearch($qs, $keyword)
    {
        return $qs->where('title', 'like', '%' . $keyword . '%')
        ->orWhere('description', 'like', '%' . $keyword . '%')
        ->orWhere('due_date', 'like', '%' . $keyword . '%')
        ->orWhere('status', 'like', '%' . $keyword . '%');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
