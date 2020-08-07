<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = [];

    /* Beziehungen des Unit Models */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'unit_id');
    }

    public function ingredientlists()
    {
        return $this->hasMany('App\Ingredientlist');
    }

   
}
