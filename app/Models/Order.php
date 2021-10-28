<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const CREATED = 'CREATED';
    const PAYED = 'PAYED';
    const REJECTED = 'REJECTED';
    const DISPATCH = 'DISPATCH';

    protected $guarded = [];
    protected $appends = ['status_class'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }



    public static function statusType()
    {
        return [
            self::CREATED,
            self::PAYED,
            self::REJECTED,
            self::DISPATCH,
        ];
    }


    public function scopeFiltered(Builder $builder)
    {
        if (session()->has('search[email]')) {
            $builder->with('customer', 'product')->whereHas('customer', function ($query) {
                $query->where('email', session('search[email]'));
            });
        } else {
            $builder->where('id', -1);
        }
        return $builder->get();

    }


}
