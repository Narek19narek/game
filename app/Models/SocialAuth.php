<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialAuth extends Model
{
    protected $fillable = ['provider', 'provider_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
