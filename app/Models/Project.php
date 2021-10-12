<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'prefix',
        'client',
        'user',
    ];
    public function clients()
    {
        return $this->belongsTo(User::class,'client','id');
    }
// public function users()
// {
//   return $this->belongsTo(User::class,'user','id');
// }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_projects', 'project_id', 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'projects', 'id');
    }
}
