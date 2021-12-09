<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\todoController;


Route::get('/todos', [todoController::class,'index']);
Route::get('todos/{id}', [todoController::class,'show']);
Route::post('addTodo', [todoController::class,'store']);
Route::put('updateTodo/{id}', [todoController::class,'update']);
Route::delete('deleteTodo/{id}', [todoController::class,'destroy']);


// or
// Route::resource('t', todoController::class);


