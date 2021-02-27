<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'code',
        'customer_name',
        'customer_address',
        'customer_phone',
        'date',
        'status',
        'total_price',
    ];


    public function dishes() {
        return $this -> belongsToMany(Dish::class);
    }
}
