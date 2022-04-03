<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\userListController;
use App\Models\userList;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/logout", [AuthController::class, 'logout']);
});

Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);

//User list Routes
Route::get("/userlist/{id}", [userListController::class, 'getAll']);
Route::post("/createList/{id}", [userListController::class, 'create']);
Route::delete("/removelist/{id}", [userListController::class, 'delete']);

//Recipes routes
Route::post("/addrecipe/{id}", [RecipeController::class, 'addRecipe']);
Route::get("/getrecipe/{id}", [RecipeController::class, 'getRecipe']);
Route::delete("/deleterecipe/{id}", [RecipeController::class, 'delete']);

//Likes Routes
Route::get("/getlikes/{id}", [LikeController::class, 'getAllLikes']);
