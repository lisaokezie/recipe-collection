<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
