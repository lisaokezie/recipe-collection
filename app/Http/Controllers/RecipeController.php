<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Category;
use App\Ingredient;


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

    public function store(Request $request)
    {
        // Neues Rezept wird erstellt
        $recipe = Recipe::create($this->validatedData());

        // Zutaten werden erstellt
        $ingredient = Ingredient::create(['name'=>$request->input('ingredient')]);
 
        // Erstellte Zutaten werden der Pivot Tabelle eingefügt
        // Mengenangabe wird eingefügt
        $recipe->ingredients()->attach($ingredient, ['amount'=>$request->input('amount')]);
        
        // Nutzer wird auf die Detailansicht des eben erstellten Rezepts weiter geleitet
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
        return view('recipe.edit', compact('recipe'), [
            'categories' => Category::all()
        ]);

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
