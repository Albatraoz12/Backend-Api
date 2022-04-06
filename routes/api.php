<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UlistController;
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

Route::middleware('auth:sanctum')->group(function () {
    //User list Routes
    Route::get("/userlist/{id}", [UlistController::class, 'getAllLists']);
    Route::post("/create-list/{id}", [UlistController::class, 'createList']);
    Route::delete("/remove-list/{id}", [UlistController::class, 'deleteList']);

    //Add Recipes to List routes
    Route::post("/addrecipe/{id}", [RecipeController::class, 'addRecipe']);
    Route::get("/getrecipe/{id}", [RecipeController::class, 'getRecipe']);
    Route::delete("/deleterecipe/{id}", [RecipeController::class, 'delete']);

    //Like Recipes Routes
    Route::get("/get-likes/{id}", [LikeController::class, 'getLikes']);
    Route::post("/add-like/{id}", [LikeController::class, 'likes']);
    Route::delete("/delete-like/{id}", [LikeController::class, 'deleteLike']);
});

Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, 'login']);
