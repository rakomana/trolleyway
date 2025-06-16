<?php

namespace App\Models;

use App\Traits\UUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TemporaryLogin extends model
{
    use UUID;
    
    const EXPIRATION_TIME_IN_MINUTES = 5;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(fn ($model) => $model->code = $model->generateCode());
    }

    /**
     * Authentication providers associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->morphTo('model');
    }

    /**
     * Gets the expiration state of the code
     *
     * @return boolean
     */
    public function isExpired()
    {
        return $this->created_at->diffInMinutes(Carbon::now())
            > static::EXPIRATION_TIME_IN_MINUTES;
    }

    /**
     * Generate a four digits code
     *
     * @param int $codeLength
     * @return string
     */
    public function generateCode()
    {
        return mt_rand(1000, 9999);
    }

    /**
     * Scope a query to only include records that belong to a user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfUser($query, $user)
    {
        return $query->whereHasMorph(
            'account',
            [User::class],
            fn (Builder $query) => $query->where('id', $user->id)
        );
    }
}
