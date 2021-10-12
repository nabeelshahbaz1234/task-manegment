<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_images extends Model
{
    use HasFactory;

    
        protected $fillable = [
        'task_id',
        'images',

    ];
    public function Task()
    {
        return $this->belongsTo(Task::class);
    }
}
