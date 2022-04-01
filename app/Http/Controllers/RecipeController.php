<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function getRecipe(Request $request, $id)
    {

        $list = UserList::find($id);


        $fields = $request->validate([
            'list_name' => 'required|string'
        ]);

        $recipe = userList::create([
            'title' => $fields['title'],
            'image' => $fields['image'],
            'recipe' => $fields['recipe'],
            'user_list_id' => $list->id,
        ]);

        $response = [
            'status' => true,
            'message' => 'Recipe is successfully added to list!',
        ];
        return response($response, 201);
    }
}
