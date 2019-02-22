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
                'index', 'show', 'get', 'store', 'getSavedRecipes', 'destroy'
            ]
        );
    }

    public function getSavedRecipes($urlParams)
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

    public function update(Request $request, Recipe $recipe)
    {
        // check if currently authenticated user is the owner of the book
        if ($request->user()->id !== $recipe->user_id) {
            return response()->json(['error' => 'You can only edit your own books.'], 403);
        }

        $recipe->update($request->only(['label', 'ingredientLines']));

        return new RecipeResource($recipe);
    }

    public function destroy(Request $request)
    {
        Recipe::where('id', $request->id)->delete();
        return RecipeResource::collection(recipe::all());
    }
}
