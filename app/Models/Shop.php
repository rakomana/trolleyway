<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use UUID;
    
    /**
     * 
    */
    public function seller()
    {
        return $this->hasMany(Seller::class);
    }

    /**
     * 
    */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
