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

        $list = Ulist::find($id);


        $fields = $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'recipe_id' => 'required|integer'
        ]);

        $recipe = Recipe::create([
            'title' => $request['title'],
            'image' => $request['image'],
            'recipe' => $request['recipe_id'],
            'ulist_id' => $list->id,
        ]);

        $response = [
            'status' => true,
            'message' => 'Recipe is successfully added to list!',
        ];
        return response($response, 201);
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
