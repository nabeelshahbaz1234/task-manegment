<?php

namespace App\Models;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    
        protected $fillable = [
        'role_id',
        'permissions',

    ];

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
}
