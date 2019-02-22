<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe.recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('label');
            $table->string('image');
            $table->string('calories');
            $table->longText('healthLabels');
            $table->longText('ingredientLines');
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
        Schema::dropIfExists('recipe_list');
    }
}
