<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,UUID;

 
    protected $guarded;
    
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * Temporary login associated with the user
     *
     * @return MorphMany
     */
    public function temporaryLogins()
    {
        return $this->morphMany(TemporaryLogin::class, 'model');
    }
   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'user_product')
                    ->withPivot('phone_number', 'order_id', 'review', 'location', 'quantity', 'status', 'track')
                    ->withTimestamps();
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'user');
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);        
    }
    
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_comments')
                    ->withPivot('comment')
                    ->withTimestamps();
    }
}
