<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne('App\Category', 'foreign_key');
    }

    public function ingredientlist()
    {
        return $this->hasMany('App\Ingredientlist');
    }
}
