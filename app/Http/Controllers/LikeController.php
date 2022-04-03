<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function getLikes($id)
    {
        //
    }

    public function likes(Request $request, $id)
    {
        $user = User::find($id);

        $fields = $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'recipe_id' => 'required|integer|unique:likes'
        ]);

        $recipe = Like::create([
            'user_id' => $user->id,
            'recipe_id' => $fields['recipe_id'],
            'title' => $fields['title'],
            'image' => $fields['image'],
        ]);

        $response = [
            'status' => true,
            'message' => 'Recipe is successfully liked!',
        ];

        // $error = [
        //     'status' => false,
        //     'message' => 'Recipe is allready added'
        // ];

        return response($response, 201);
    }
}
