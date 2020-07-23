<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});
Route::get('/recipes', 'RecipeController@index');
Route::get('/recipes/create', 'RecipeController@create');
Route::post('/recipes', 'RecipeController@store');
Route::get('/recipes/{recipe}', 'RecipeController@show');
Route::get('/recipes/{recipe}/edit', 'RecipeController@edit');
Route::patch('/recipes/{recipe}', 'RecipeController@update');
Route::delete('/recipes/{recipe}', 'RecipeController@destroy');
Route::any('/search','RecipeController@search');