<?php

namespace App\Filters;

use App\Recipe;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RecipeFilters extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
  
    public function category($term) {
        return $this->builder->where('recipes.category_id', 'LIKE', "%$term%");
    }
}
