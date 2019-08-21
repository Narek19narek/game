<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $fillable = [
        'user_id',
        'nickname',
        'ip_address',
        'lobby_id',
        'time',
        'points',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lobby() {
        return $this->belongsTo(Lobby::class, 'lobby_id', 'id');
    }
}
