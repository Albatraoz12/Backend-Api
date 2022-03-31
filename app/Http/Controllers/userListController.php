<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userList;
use Illuminate\Http\Request;

class userListController extends Controller
{
    public function create(Request $request, $id)
    {
        $user = User::find($id);

        $fields = $request->validate([
            'list_name' => 'required|string'
        ]);

        $list = userList::create([
            'list_name' => $fields['list_name'],
            'user_id' => $user->id,
        ]);

        $response = [
            'status' => true,
            'message' => 'User list successfully created!',
        ];
        return response($response, 201);
    }
}
