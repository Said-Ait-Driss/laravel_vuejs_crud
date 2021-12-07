<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\todoController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/todos', [todoController::class,'index']);
Route::get('todos/{id}', [todoController::class,'show']);
Route::post('addTodo', [todoController::class,'store']);
Route::put('updateTodo/{id}', [todoController::class,'update']);
Route::delete('deleteTodo/{id}', [todoController::class,'destroy']);


// or
// Route::resource('t', todoController::class);


