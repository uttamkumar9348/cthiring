<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    public function position_name()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function client_n()
    {
        return $this->belongsTo(client::class, 'client_id');
    }
}