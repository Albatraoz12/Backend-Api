<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function getAllLikes(Request $request, $id)
    {
        $user = User::find($id);

        $fields = $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'recipe' => 'required|integer'
        ]);

        $recipe = Like::create([
            'title' => $fields['title'],
            'image' => $fields['image'],
            'recipe' => $fields['recipe'],
            'user_id' => $user->id,
        ]);

        $response = [
            'status' => true,
            'message' => 'Recipe is successfully added to list!',
        ];
        return response($response, 201);
    }
}
