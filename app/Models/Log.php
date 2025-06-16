<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use UUID;
    
    public function user()
    {
        return $this->morphTo('user');
    }
}
