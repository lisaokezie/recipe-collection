<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;

class Recipe extends Model
{
    use Filterable;

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'ingredientlists','recipe_id','ingredient_id')
        ->withPivot(['unit_id','amount']);
    }
}
