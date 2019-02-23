<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(
            [
                'store', 'getSavedRecipes', 'destroy', 'updateRecipe'
            ]
        );
    }

    public function getSavedRecipes()
    {
        return RecipeResource::collection(Recipe::all());
    }
    
    public function store(Request $request)
    {
        $recipe = Recipe::create(
            [
                'email' => $request->email,
                'label' => $request->label,
                'image' => $request->image,
                'calories' => $request->calories,
                'healthLabels' => $request->healthLabels,
                'ingredientLines' => $request->ingredientLines
            ]
        );
        return new RecipeResource($recipe);
    }

    public function updateRecipe(Request $request)
    {
        
       Recipe::where('id', $request->id)->update($request->all());
    }

    public function destroy(Request $request)
    {
        Recipe::where('id', $request->id)->delete();
        return RecipeResource::collection(Recipe::all());
    }
}
