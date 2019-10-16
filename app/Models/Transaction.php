<?php

namespace App\Models;

use App\Coin;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const DEF = 0;
    const RETURNED = 1;
    const APPROVED = 2;
    const REJECTED = 3;

    const STRIPE   = 1;
    const PAYPAL   = 2;
    const BITCOIN  = 3;

    protected $fillable = ['type', 'receiver_id', 'coin_id', 'status'];

    protected $appends = ['status_label'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coin()
    {
        return $this->hasOne(Coin::class, 'id', 'coin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }


    /**
     * @return array
     */
    public static function getTypes() {
        return [
            'stripe'  => self::STRIPE,
            'paypal'  => self::PAYPAL,
            'bitcoin' => self::BITCOIN
        ];
    }


    /**
     * @return array
     */
    public static function getStatuses() {
        return [
            'def'       => self::DEF,
            'approved'  => self::APPROVED,
            'rejected'  => self::REJECTED,
            'returned'  => self::RETURNED
        ];
    }


    public function getStatusLabelAttribute()
    {
        return ucfirst(array_flip(self::getStatuses())[$this->status]);
    }

    public function getTypeLabelAttribute()
    {
        return ucfirst(array_flip(self::getTypes())[$this->type]);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d.m.Y');
    }
}
