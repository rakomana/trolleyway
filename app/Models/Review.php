<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use UUID;
    
    /**
     * 
    */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
