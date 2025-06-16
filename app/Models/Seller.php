<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasRoles, Notifiable, UUID;
    
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'user');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
