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

        //Zutatenliste aus Nutzereingabe erstellen
        foreach ($request->ingredients as $ingredient) {
            //Daten aus Request zuweisen
            $name = $ingredient['name'];
            $amount = $ingredient['amount'];

            //Wenn eine Zutat mit diesem namen bereits existiert wird diese gefunden und verwendet,
            //ansonsten wird eine neue Zutat erstellt -> keine mehrfachen Datenbankeinträge
            $ingredient = Ingredient::firstOrCreate([
                'name' => $name
            ]);

            //Pivot Tabelle 'Ingredientlists' wird mit Zutat und Menge befüllt
            $recipe->ingredients()->attach($ingredient, ['amount'=>$amount]);
        }


        // Nutzer wird auf die Detailansicht des erstellten Rezepts weiter geleitet
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
            // 'ingredients.*.ingredient' => 'required',
            // 'amounts.*.amount' => 'required'
        ]);
    }
}
