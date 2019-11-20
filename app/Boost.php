<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boost extends Model
{
    protected $table = 'boosts';
    const  SWITCH = 'switch';
    const  TELEPORT = 'teleport';
    const  PUSH = 'push';

    static function getTypes()
    {
        return [
            self::SWITCH => 'Switch',
            self::TELEPORT => 'Teleport',
            self::PUSH => 'Push'
        ];
    }

    protected $fillable = [
        'name',
        'amount',
        'duration',
        'coin',
    ];

    public function scopeType($query, $type)
    {
        return $query->where('name', $type);
    }
}
