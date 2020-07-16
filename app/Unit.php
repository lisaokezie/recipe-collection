<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function ingredientlist()
    {
        return $this->hasMany('App\Ingredientlist');
    }
}
