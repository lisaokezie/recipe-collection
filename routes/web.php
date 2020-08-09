<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

/*
Die 'init' Route verlinkt den Storage der App neu, 
erstellt mithilfe des migrate Befehls die Datenbanktabellen und füllt diese
*/
Route::get('/init', function () {
    Artisan::call('storage:link');
    Artisan::call('migrate:fresh');
    return redirect('/recipes');
});

/* Aktionen für 'Recipe' */
Route::redirect('/', '/recipes');
Route::get('/recipes', 'RecipeController@index')->name('recipes.index');
Route::get('/recipes/create', 'RecipeController@create')->middleware('auth');
Route::post('/recipes', 'RecipeController@store');
Route::get('/recipes/{recipe}', 'RecipeController@show');
Route::get('/recipes/{recipe}/edit', 'RecipeController@edit')->middleware('auth');
Route::patch('/recipes/{recipe}', 'RecipeController@update')->middleware('auth');
Route::delete('/recipes/{recipe}', 'RecipeController@destroy')->middleware('auth');
Route::any('/search','RecipeController@search');

Route::get('/downloadPDF/{id}','RecipeController@downloadPDF');

/* Aktionen für 'Category' */
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/create', 'CategoryController@create')->middleware('auth');
Route::post('/categories', 'CategoryController@store');

/* Aktionen für Authentification*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* Aktion für 'Comment' */
Route::post('recipes/{recipe}/comments', 'CommentController@store');
