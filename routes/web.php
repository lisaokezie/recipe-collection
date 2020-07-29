<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('home');
// });
Route::redirect('/', '/recipes');

Route::get('/recipes', 'RecipeController@index')->name('recipes.index');
Route::get('/recipes/create', 'RecipeController@create')->middleware('auth');
Route::post('/recipes', 'RecipeController@store');
Route::get('/recipes/{recipe}', 'RecipeController@show');
Route::get('/recipes/{recipe}/edit', 'RecipeController@edit')->middleware('auth');
Route::patch('/recipes/{recipe}', 'RecipeController@update')->middleware('auth');
Route::delete('/recipes/{recipe}', 'RecipeController@destroy')->middleware('auth');
Route::any('/search','RecipeController@search');

//Category
Route::get('/categories', 'CategoryController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
