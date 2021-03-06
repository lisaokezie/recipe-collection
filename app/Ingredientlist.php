<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Unit;

class Ingredientlist extends Model
{
    protected $guarded = [];

    /* Beziehungen des Ingredientlist Models */
    public function ingredient()
    {
        return $this->belongsTo('App\ingredient');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
