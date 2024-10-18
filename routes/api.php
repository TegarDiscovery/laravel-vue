<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/complete', [TodoController::class, 'indexComplete']);
Route::get('/todos/{id}', [TodoController::class, 'show']);
Route::post('/todos', [TodoController::class, 'create']);
Route::put('/todos/{id}', [TodoController::class, 'update']);
Route::patch('/complete/{id}', [TodoController::class, 'complete']);
Route::delete('/todos/{id}', [TodoController::class, 'delete']);
