<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
  return 'Hello World';
});
Route::post('/createUser', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/deleteUser', [UserController::class, 'delete']);
Route::post('/createPost', [PostController::class, 'create']);
Route::post('/getPostOf', [PostController::class, 'getPostOf']);
Route::get ('/getPost', [PostController::class, 'getPost']);

