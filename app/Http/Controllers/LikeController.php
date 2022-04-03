<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function getLikes($id)
    {
        $likes = Like::where('user_id', $id)->get();
        $response = [
            'status' => true,
            'message' => $likes
        ];

        return response($response, 201);
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

        return response($response, 201);
    }

    public function deleteLike($id)
    {
        $liked = Like::find($id);
        $liked->delete();

        $response = [
            'status' => true,
            'message' => 'You dont like this recipe anymore',
        ];
        return response($response, 201);
    }
}
