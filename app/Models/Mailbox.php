<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    use HasFactory;

    public function sendbyname_mailbox()
    {
        return $this->belongsTo(User::class, 'send_by');
    }
}
