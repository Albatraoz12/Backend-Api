<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function addRecipe(Request $request, $id)
    {

        $list = UserList::find($id);


        $fields = $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'recipe' => 'required|integer'
        ]);

        $recipe = Recipe::create([
            'title' => $fields['title'],
            'image' => $fields['image'],
            'recipe' => $fields['recipe'],
            'user_lists_id' => $list->id,
        ]);

        $response = [
            'status' => true,
            'message' => 'Recipe is successfully added to list!',
        ];
        return response($response, 201);
    }
}
