<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredientlist extends Model
{
    protected $guarded = [];

    public function ingredient()
    {
        return $this->belongsTo('App\ingredient');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
