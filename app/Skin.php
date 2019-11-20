<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Type;

class Skin extends Model
{
    const DEF_COLOR = '#1b00ff';
    const COLORS = 1;
    const MASKS = 2;
    const FLAGS = 3;
    const OTHER = 4;

    protected $fillable = ['skin', 'coin', 'color', 'type','image'];

    protected $attributes = [
        'type' => self::COLORS
    ];

    static function getTypes()
    {
        return [
            self::COLORS => 'Colors',
            self::MASKS => 'Masks',
            self::FLAGS => 'Flags',
            self::OTHER => 'Other',
        ];
    }

    static function getTypesValue()
    {
        return array_keys(self::getTypes());
    }

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

    public function scopeType($query, $type = null)
    {
        return $query->where('type', $type ?? get_type());
    }
    public function getImageUrlAttribute()
    {
        return Storage::url('skins/'. $this->image);
    }
}
