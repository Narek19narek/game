<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    const DEF_COLOR = '#1b00ff';

    protected $fillable = [
        'skin',
        'coin',
    ];

    public function user_skins()
    {
        return $this->belongsToMany(User::class, 'user_skins', 'skin_id', 'user_id');
    }

    /**
     * @return int|null
     */
    public static function defaultSkin()
    {
        $skin = self::query()
            ->where('skin', '=', self::DEF_COLOR)
            ->first();

        return empty($skin) ? null : $skin->id;
    }
}
