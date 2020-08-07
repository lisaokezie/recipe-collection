<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    /* Beziehungen des Recipe Models */
    public function category()
    {
        return $this->belongsTo('App\Category');

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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /* 
    Lokale Scopes für das Filtern nach Kategorien und das Suchen von Rezepten 
    werden im RecipeController verwendet   
    */
    public function scopeCategories($query, $category)
    {
        if($category != ''){
            return $query->where('recipes.category_id', 'LIKE', "%$category%");
        }
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%');
    }
}
