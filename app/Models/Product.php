<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function imagePath()
    {
        return sprintf('%s/%s', '/storage/products', $this->file);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
