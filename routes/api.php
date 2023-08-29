<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Food\StoreFoodController;
use App\Http\Controllers\Invited\Indexinveted;
use App\Http\Controllers\Object\IndexObject;
use App\Http\Controllers\Object\ObjectDeleted;
use App\Http\Controllers\Object\ObjectMe;
use App\Http\Controllers\Object\ObjectShow;
use App\Http\Controllers\Object\PostObjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');
    Route::get('/me', 'me');
});

//Invted
Route::prefix('inveted')->group(function () {
    Route::get('/', Indexinveted::class);
});

//Object
Route::prefix('object')->group(function () {
    Route::get('/', IndexObject::class);
    Route::post('/', PostObjectController::class);
    Route::get('/me', ObjectMe::class);
    Route::get('/{item}',ObjectShow::class);
    Route::delete('/{item}',ObjectDeleted::class);

});
Route::prefix('food')->group(function () {
    Route::post('/', StoreFoodController::class);
});
