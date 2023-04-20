<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'remarks',
        'user_id',
        'task_id',
        'status_id'
    ];
}
