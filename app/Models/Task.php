<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
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

    protected $appends = ['remain_days'];

    public function getRemainDaysAttribute() {
        $currentDate = new DateTime('now', new DateTimeZone('Africa/Dar_es_Salaam'));
        $currentDateFormatted = $currentDate->format('Y-m-d');
        
        if ($this->due_date >= $currentDateFormatted && $this->status != 'completed') {
            // Calculate the difference in days
            $dueDate = new DateTime($this->due_date);
            $diff = $currentDate->diff($dueDate);
            return $diff->days;
        } else {
            // Handle overdue cases
            if ($this->status == 'completed') {
                return '';
            } else {
                return 'Overdue';
            }
        }
    }
    
}
