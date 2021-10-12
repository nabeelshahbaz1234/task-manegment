<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'image',
        'pr_roles',
        'salary',
        'project',
        'phone',
        'password',
        'confirmed_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'confirmed_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


public function getPictureAttribute($value)
{
    if($value){
           return('users/images/'.$value);

     } else{
        return('users/images/no-image.png');
           }
    }

public function Role(){
      
return $this->belongsTo(Role::class,'pr_roles','id');
}

// public function Projects(){

// return $this->hasMany(Project::class,'user','id');
// }

public function clienT_Projects(){

return $this->hasMany(Project::class,'client','id');
}

public function projects()
{
    return $this->belongsToMany(Project::class, 'user_projects', 'user_id', 'project_id');
}

public function Tasks()
{
 return $this->hasMany(Task::class, 'assign', 'id');
}



}


