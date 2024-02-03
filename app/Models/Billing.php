<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $table = 'billing';

    public function user_name()
    {
        return $this->belongsTo(user::class, 'created_by');
    }

    public function client_name()
    {
        return $this->belongsTo(client::class, 'client_id');
    }
}