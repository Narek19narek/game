<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boost extends Model
{
    protected $table = 'boosts';

    protected $fillable = [
        'name',
        'amount',
        'duration',
        'coin',
    ];
}
