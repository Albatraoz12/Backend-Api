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

        $exists = Like::where('recipe_id', $request['recipe_id'])->where('user_id', $id);

        if (!$exists->count()) {

            $recipe = Like::create([
                'user_id' => $id,
                'recipe_id' => $request['recipe_id'],
                'title' => $request['title'],
                'image' => $request['image'],
            ]);

            $response = [
                'status' => true,
                'message' => 'Recipe is successfully added to list!',
            ];

            return response($response, 201);
        } else {

            $response = [
                'status' => false,
                'message' => 'Recipe is already added to list!',
            ];
            return response($response, 404);
        }
    }

    public function deleteLike($id)
    {
        $liked = Like::where('recipe_id', $id);
        $liked->delete();

        $response = [
            'status' => true,
            'message' => 'You dont like this recipe anymore',
        ];
        return response($response, 201);
    }
}
