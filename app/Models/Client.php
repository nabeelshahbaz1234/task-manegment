<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'name',
        'department',
        'email',
        'image',
        'password',
        'co_password',
        'website',
    ];

    protected $hidden = [
        'password',
        'co_password',
        
    ];

  
    
}
