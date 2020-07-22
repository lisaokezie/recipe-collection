<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientlists', function (Blueprint $table) {
            $table->foreignId('recipe_id')->onDelete('cascade');            
            $table->foreignId('ingredient_id')->onDelete('cascade');            
            $table->double('amount');            
            // $table->foreignId('unit_id')->onDelete('cascade');
            $table->unique(['ingredient_id', 'recipe_id']);           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientlists');
    }
}
