<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Category;


class RecipeController extends Controller
{
    public function index()
    {
        $recipes = recipe::all();
        return view('recipe.index', compact('recipes'));
    }

    public function create()
    {
        $recipe = new Recipe();
        return view('recipe.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $recipe = Recipe::create($this->validatedData());
        // $recipe = \App\Recipe::create([]);
        // $recipe->category()->attach(request('category_id'));

        return redirect('/recipes/'.$recipe->id);
    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'), [
            'categories' => Category::all()
        ]);
    }

    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', compact('recipe'));

    }

    public function update(Recipe $recipe)
    {
        $recipe->update($this->validatedData());
        return redirect('/recipes/'.$recipe->id);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect('/recipes');

    }

    private function validatedData(){
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'instructions' => 'required',
            'servings' => 'required',
            'time' => 'required',
            'rating' => 'required'
        ]);
    }
}
