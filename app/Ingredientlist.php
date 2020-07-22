<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Unit;

class Ingredientlist extends Model
{
    protected $guarded = [];

    public function ingredient()
    {
        return $this->belongsTo('App\ingredient');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'id', 'unit_id');
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
