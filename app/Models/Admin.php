<?php

namespace App\Models;

use App\Traits\UUID;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasRoles, Notifiable, UUID;
    
    /**
     * 
    */
    public function logs()
    {
        return $this->morphMany(Log::class, 'user');
    }
}
