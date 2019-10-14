<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    protected $table = 'skins';

    protected $fillable = [
        'skin',
        'coin',
    ];

    public function user_skins()
    {
        return $this->belongsToMany(User::class, 'user_skins', 'skin_id', 'user_id');
    }
}
