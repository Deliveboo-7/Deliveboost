<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'price',
        'visibile',
        'type',
    ];

    public function user() {
        return $this -> belongsTo(User::class);
    }
}
