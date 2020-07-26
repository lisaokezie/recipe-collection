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
}
