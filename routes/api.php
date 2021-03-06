<?php

use App\Http\Controllers\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\QuestionController;
use App\Http\Controllers\api\ReplyController;
use App\Http\Controllers\api\LikeController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/photos/popular', [PhotoController::class, 'popular']);
//Route::apiResource('photos', PhotoController::class);

Route::apiResource('questions', QuestionController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('/questions/{question}/replies', ReplyController::class);
Route::post('/like/{reply}', [LikeController::class, 'like'])->name('like');
Route::delete('/like/{reply}', [LikeController::class, 'unlike'])->name('unlike');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('signup', [AuthController::class, 'signup']);

});
