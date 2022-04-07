<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ulist;
use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function addRecipe(Request $request, $id)
    {

        $exists = Recipe::where('recipe', $request['recipe_id'])->where('ulist_id', $id);

        if (!$exists->count()) {

            $recipe = Recipe::create([
                'title' => $request['title'],
                'image' => $request['image'],
                'recipe' => $request['recipe_id'],
                'ulist_id' => $id,
            ]);

            $response = [
                'status' => true,
                'message' => 'Recipe is successfully added to list!',
            ];

            return response($response, 201);
        } else {

            $response = [
                'status' => false,
                'message' => 'Recipe is not added to list!',
            ];
            return response($response, 404);
        }
    }

    public function getRecipe($id)
    {
        $recipe = Recipe::where('ulist_id', $id)->get();
        $response = [
            'status' => true,
            'message' => $recipe
        ];

        return response($response, 201);
    }

    public function delete($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        $response = [
            'status' => true,
            'message' => 'Recipe is successfully deleted from list!',
        ];
        return response($response, 201);
    }
}
