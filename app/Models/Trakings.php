<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trakings extends Model
{
    use HasFactory;
    protected $table = 'usertraking';
    protected $fillable = [
        'users_id',
        'name',
        'email',
        'ip_addresh',
        'device',
    ];
}
