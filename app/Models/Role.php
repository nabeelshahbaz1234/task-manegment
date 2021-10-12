<?php

namespace App\Models;
use App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'name',
        'description',
    ];

    public function Permission(){

        return $this->hasMany(Permission::class,'role_id','id');
    }
}
