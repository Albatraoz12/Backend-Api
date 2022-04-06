<?php

namespace App\Http\Controllers;

use App\Models\Ulist;
use App\Models\User;
use Illuminate\Http\Request;

class UlistController extends Controller
{
    public function getAllLists($id)
    {

        $list = Ulist::where('user_id', $id)->get();
        $response = [
            'status' => true,
            'message' => $list
        ];

        return response($response, 201);
    }

    public function createList(Request $request, $id)
    {
        $user = User::find($id);

        $fields = $request->validate([
            'list_name' => 'required|string'
        ]);

        $list = Ulist::create([
            'list_name' => $fields['list_name'],
            'user_id' => $user->id,
        ]);

        $response = [
            'status' => true,
            'message' => 'User list successfully created!',
        ];
        return response($response, 201);
    }

    public function deleteList($id)
    {
        $list = Ulist::find($id);
        $list->delete();

        $response = [
            'status' => true,
            'message' => 'User list successfully deleted!',
        ];
        return response($response, 201);
    }
}
