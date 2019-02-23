<?php

Route::group([

    'middleware' => 'api',

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('save-recipe', 'RecipeController@store');
    Route::get('recipe', 'RecipeController@getSavedRecipes');
    Route::post('delete-recipe', 'RecipeController@destroy');
    Route::put('update-recipe', 'RecipeController@updateRecipe');
});
