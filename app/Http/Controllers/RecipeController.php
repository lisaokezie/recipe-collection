<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create()
    {
        return view('recipe.create');
    }

    public function store()
    {

        // dd(request()->all());

    
        $data = request()->validate([

            'title' => 'required',
            'description' => 'required'
        ]);
        dd($data);
        // $recipe = \App\Recipe::create([]);

        // return redirect('/recipes/'.$recipe->id);

    }

    public function show(App\Recipe $recipe)
    {
        return view('recipe.show', compact('recipe'));
    }
}
