<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Schema::create('ingredient_recipe', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('recipe_id')->onDelete('cascade');            
        //     $table->foreignId('ingredient_id')->onDelete('cascade');            
        //     $table->double('amount');            
        //     // $table->foreignId('unit_id')->onDelete('cascade'); 
        //     $table->unique(['ingeredient_id', 'recipe_id']);           
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
