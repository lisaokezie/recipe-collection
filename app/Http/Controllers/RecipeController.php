<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = recipe::all();
        return view('recipe.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function store()
    {
        $recipe = Recipe::create($this->validatedData());
        // $recipe = \App\Recipe::create([]);

        return redirect('/recipe/'.$recipe->id);

    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'));
    }

    private function validatedData(){
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'instructions' => 'required',
            'servings' => 'required',
            'time' => 'required',
            'rating' => 'required'
        ]);
    }
}
