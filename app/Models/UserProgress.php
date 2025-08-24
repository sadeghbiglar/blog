<?php

// app/Models/UserProgress.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    protected $table = 'user_progress';

    protected $fillable = [
        'user_id',
        'current_stage',
        'repeat_count',
        'in_special',
        'last_completed_stage',
    ];
}
