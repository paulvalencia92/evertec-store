<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    const CREATED = 'CREATED';
    const PAYED = 'PAYED';
    const REJECTED = 'REJECTED';
    const DISPATCH = 'DISPATCH';


    public static function statusType()
    {
        return [
            self::CREATED,
            self::PAYED,
            self::REJECTED,
            self::DISPATCH,
        ];
    }


}
