<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
    public function players() {
        return $this->hasMany(Player::class, 'lobby_id', 'id');
    }
}
