<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use UUID;
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'blog_comments')
                    ->withPivot('comment')
                    ->withTimestamps();
    }
}
