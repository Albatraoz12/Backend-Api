<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userList;
use App\Models\UserList as ModelsUserList;
use Illuminate\Http\Request;

class userListController extends Controller
{

    public function getAll($id)
    {

        $list = UserList::where('user_id', $id)->get();
        // dd($list);
        $response = [
            'status' => true,
            'message' => $list
        ];

        return response($response, 201);
    }

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

    public function delete($id)
    {
        $list = userList::find($id);
        $list->delete();

        $response = [
            'status' => true,
            'message' => 'User list successfully deleted!',
        ];
        return response($response, 201);
    }
}
