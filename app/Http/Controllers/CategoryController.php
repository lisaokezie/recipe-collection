<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /* Gibt alle Kategorien auf der index Seite aus */
    public function index()
    {
        $categories = category::all();
        return view('category.index', compact('categories'));
    }

    /* Verweist auf die Seite zum Erstellen einer neuen Kategorie */
    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    /* Speichert die Kategorie sofern sie noch nicht existiert */
    public function store(Request $request)
    {
        $category = Category::firstOrCreate($request->validate([
            'name' => 'required|max:25',
        ]));

        return redirect('/categories');
    }
}
