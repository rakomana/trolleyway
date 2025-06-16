<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Notifiable, UUID;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
