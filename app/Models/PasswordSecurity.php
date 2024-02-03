<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordSecurity extends Model
{
    use HasFactory;
    protected $table = "password_expire";

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
