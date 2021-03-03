<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $fillable = [
        'name',
        'icon'
    ];

    public function users() {
        return $this -> belongsToMany(User::class);
    }
}
