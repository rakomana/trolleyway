<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use UUID;

    /**
     * 
    */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
