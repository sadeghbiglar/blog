<?php
// app/Models/UserStageResult.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStageResult extends Model
{
    protected $fillable = [
        'user_id',
        'stage_number',
        'is_special',
        'iteration_count',
        'success',
    ];
}
