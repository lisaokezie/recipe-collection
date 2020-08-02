<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Category;
use App\Ingredient;
use App\Unit;

use App\Filters\RecipeFilters;


class RecipeController extends Controller
{
    public function index(Request $request, RecipeFilters $filters)
    {
        $recipes =  Recipe::filter($filters)->orderBy('created_at','DESC')->paginate(12);
        return view('recipe.index', compact('recipes'));
    }

    public function create()
    {
        $recipe = new Recipe();
        return view('recipe.create', ['categories' => Category::all()], compact('recipe'));
    }

    public function store(Request $request)
    {
        // Neues Rezept wird erstellt
        $recipe = new Recipe($this->validatedData());
        $recipe->user_id = auth()->id();
        $recipe->save();

        //Zutatenliste aus Nutzereingabe erstellen
        $this->saveIngredientlist($request, $recipe);

        // Nutzer wird auf die Detailansicht des erstellten Rezepts weiter geleitet
        return redirect('/recipes/'.$recipe->id);
    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'), [
            'categories' => Category::all(), 'units' => Unit::all()
        ]);
    }

    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', compact('recipe'), [
            'categories' => Category::all(), 'units' => Unit::all()
        ]);

    }

    public function update(Recipe $recipe, Request $request)
    {
        $recipe->update($this->validatedData());

        $recipe->ingredients()->detach();

        $this->saveIngredientlist($request, $recipe);

        return redirect('/recipes/'.$recipe->id);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect('/recipes');

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $recipe = Recipe::where('title','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->paginate(12);
        if(count($recipe) > 0)
            return view('recipe.search')->withDetails($recipe)->withQuery ( $search );
        else return view ('recipe.search')->withMessage('Es wurden keine rezepte gefunden');
    }


    private function validatedData(){
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'instructions' => 'required',
            'servings' => 'required|integer|min:1|max:100',
            'time' => 'required|integer|min:1',
            'rating' => 'required|integer|min:1|max:5',
            // 'ingredients.1.ingredient' => '',
            // 'ingredients.1.amount' => '',
            // 'ingredients.1.unit' => ''
        ]);
    }

    private function validatedIngredients(){
        return request()->validate([
            'ingredients.*.ingredient' => '',
            'ingredients.*.amount' => '',
            'ingredients.*.unit' => ''
        ]);
    }

    private function saveIngredientlist(Request $request, Recipe $recipe){
        foreach ($request->ingredients as $ingredient) {
            //Daten aus Request zuweisen
            $ingredientName = $ingredient['name'];
            $amount = $ingredient['amount'];
            $unitName = $ingredient['unit'];

            //Wenn eine Zutat mit diesem namen bereits existiert wird diese gefunden und verwendet,
            //ansonsten wird eine neue Zutat erstellt -> keine mehrfachen Datenbankeinträge
            $ingredient = Ingredient::firstOrCreate([
                'name' => $ingredientName
            ]);

            $unit = Unit::firstOrCreate([
                'name' => $unitName
            ]);

            //Pivot Tabelle 'Ingredientlists' wird mit Zutat und Menge befüllt
            $recipe->ingredients()->attach($ingredient, ['amount'=>$amount, 'unit_id'=>$unit->id]);
        }
    }
}
