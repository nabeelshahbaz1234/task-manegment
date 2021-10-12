<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'projects',
        'assign',
        'due_date',
        'estimate_time',
        'description'
    
    ];

    /**
     * Get the Project that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proj()
    {
        return $this->belongsTo(Project::class, 'projects', 'id');;
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'assign', 'id');
    }
    public function comments()
    {
     return $this->hasMany(Comment::class, 'tasks_id', 'id');
    }

    public function Task_images(){

        return $this->hasMany(Task_images::class,'task_id','id');
    }


    /**
     * Get the Assigner that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Assigner()
    {
        return $this->belongsTo(User::class, 'Assigner', 'id');
    }

    

}
