<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recipe;
use App\Category;
use App\Ingredient;
use App\Unit;

use PDF;

class RecipeController extends Controller
{
    /* Gibt alle Rezepte bzw. Rezepte mit einer bestimmten Kategorie auf der index Seite aus */
    public function index(Request $request)
    {
        $recipes = Recipe::categories($request->category)->orderBy('created_at','DESC')->paginate(12);
        return view('recipe.index', compact('recipes'))->withQuery($request->name);
    }

    /* Verweist auf die Seite zum Erstellen eines neuen Rezepts */
    public function create()
    {
        $recipe = new Recipe();
        return view('recipe.create', ['categories' => Category::all()], compact('recipe'));
    }

    /* Neues Rezept wird in Abhängigkeit der Zutatenliste erstellt */
    public function store(Request $request)
    {
        return \DB::transaction(function () use ($request){
            $recipe = new Recipe($this->validatedData());
            $recipe->user_id = auth()->id();
            $recipe->save();
            $this->storeImage($recipe);

            $this->saveIngredientlist($request, $recipe);

            if(!$recipe){
                return redirect('/recipes/create');
            }
            else{
                return redirect('/recipes/'.$recipe->id);
            }
        });        
    }

    /* Zeigt eine Detailansicht eines Rezepts an */
    public function show(Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'), [
            'categories' => Category::all(), 'units' => Unit::all()
        ]);
    }

    /* Verweist auf die Seite zum Bearbeiten eines Rezepts */
    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', compact('recipe'), [
            'categories' => Category::all(), 'units' => Unit::all()
        ]);

    }

    /* Speichert die Änderungen an einem Rezept */
    public function update(Recipe $recipe, Request $request)
    {
        return \DB::transaction(function () use ($recipe, $request){
        $recipe->update($this->validatedData());

        $this->storeImage($recipe);

        $recipe->ingredients()->detach();

        $this->saveIngredientlist($request, $recipe);

        return redirect('/recipes/'.$recipe->id);
        });
    }

    /* Löscht ein Rezept */
    public function destroy(Recipe $recipe)
    {
        $recipe->ingredients()->detach();
        $recipe->delete();
        return redirect('/recipes');
    }

    /* Suche nach einem Rezept mit passendem Titel oder Beschreibung */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $recipes = Recipe::Search($search)->paginate(12);
        if(count($recipes) > 0)
            return view('recipe.search')->withDetails($recipes)->withQuery($search);
        else return view ('recipe.search')->withMessage('Es wurden keine rezepte gefunden');
    }

    /* Validieren von Rezeptangaben */
    private function validatedData(){
        return request()->validate([
            'title' => 'required',
            'description' => 'required|max:200',
            'category_id' => 'required',
            'instructions' => 'required',
            'servings' => 'required|integer|min:1|max:100',
            'time' => 'required|integer|min:1',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'sometimes|file|image|max:5000'
        ]);
    }

    /* Validieren der Zutatenliste */
    private function validatedIngredients(){
        return request()->validate([
            'ingredients.*.name' => 'required',
            'ingredients.*.amount' => 'required',
            'ingredients.*.unit' => 'required'
        ]);
    }

    /* Speichern der Zutatenliste mit den zugehörigen Beziehungen */
    private function saveIngredientlist(Request $request, Recipe $recipe){

        $ingredients = $this->validatedIngredients()['ingredients'];
        foreach ($ingredients as $ingredient) {

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

    /* Hochladen eines Rezeptfotos */
    private function storeImage($recipe){
        if(request()->has('image')){
            $recipe->update([
                'image' => request()->image->store('uploads','public')
            ]);
        }
    }

    /* Generieren und Herunterladen eines Rezepts als PDF */
    public function downloadPDF($id) {
        $recipe = Recipe::find($id);
        $units = Unit::all();

        $pdf = PDF::loadView('recipe.pdf', compact('recipe','units'));
        
        return $pdf->download($recipe->title.'-Rezept.pdf');
    }
}