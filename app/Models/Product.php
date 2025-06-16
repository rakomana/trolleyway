<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{   
    use UUID;

    protected $appends = ['picture', 'images'];

    /**
     * 
    */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * 
    */
    public function user()
    {
        return $this->belongsToMany(Product::class, 'user_product')
                    ->withPivot('phone_number', 'order_id', 'review', 'location', 'quantity', 'status', 'track')
                    ->withTimestamps();
    }

    /**
     * 
    */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getPictureAttribute()
    {
        return json_decode($this->image)[0];
    }

    public function getImagesAttribute()
    {
        $data = json_decode($this->image);
        $string = '';
    
        $string = implode(',', $data).$string;
        
        return $string;
    }
}