<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    public function store(Request $request)
    {
        $category = Category::firstOrCreate($request->validate([
            'name' => 'required|max:25',
        ]));

        return redirect('/categories');
    }
}
