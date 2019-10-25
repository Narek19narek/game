<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'google_id', 'level', 'switch', 'teleport', 'push', 'coins', 'total_time', 'skeen_id', 'game_count', 'total_points', 'is_playing',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected const K = 1.618003398875 ** 2;

    public static function find(?int $id)
    {
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function isAdmin() {
        return $this->role_id === 1;
    }

    public function players() {
        return $this->hasMany(Player::class, 'user_id', 'id');
    }

    public function skins () {
        return $this->belongsToMany(Skin::class, 'user_skins', 'user_id', 'skin_id');
    }

    public function levelXp() {
            $xp = $this->total_points;
            return $xp;
    }
    public function nextLevelXp() {
        $level = $this->level;
            $xp = round((($level + 1) ** self::K));
            return $xp;
    }
}
