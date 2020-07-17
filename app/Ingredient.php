<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];

    public function ingredient()
    {
        return $this->hasMany('App\Ingredient');
    }
}
