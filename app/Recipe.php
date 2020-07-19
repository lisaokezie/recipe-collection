<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredientlists','recipe_id','ingredient_id')
        ->withPivot(['amount']);
    }
}
