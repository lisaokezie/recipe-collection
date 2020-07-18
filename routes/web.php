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
Route::get('/recipe', 'RecipeController@index');
Route::get('/recipe/create', 'RecipeController@create');
Route::post('/recipe', 'RecipeController@store');
Route::get('/recipe/{recipe}', 'RecipeController@show');
Route::get('/recipe/{recipe}/edit', 'RecipeController@edit');
Route::patch('/recipe/{recipe}', 'RecipeController@update');
Route::delete('/recipe/{recipe}', 'RecipeController@destroy');
