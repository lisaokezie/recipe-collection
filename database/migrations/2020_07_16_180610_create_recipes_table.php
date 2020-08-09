<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');            
            $table->string('title');
            $table->string('description');
            $table->text('instructions');
            $table->integer('servings');
            $table->integer('time');
            $table->integer('rating');
            $table->foreignId('user_id'); 
            $table->string('image')->nullable();           
            $table->timestamps();

        });

        DB::unprepared(File::get(base_path() . '/database/seeds/recipes.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
