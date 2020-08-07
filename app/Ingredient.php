<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];

    /* Beziehungen des Ingredient Models */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe', 'ingredientlists');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
