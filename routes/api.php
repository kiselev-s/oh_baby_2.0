<?php

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

Route::get('/', function()
{
    dd('Главная страница');
});

Route::get('/docs', function()
{
    dd('Документы');
});

Route::get('/health', function()
{
    dd('Здоровье');
});

Route::get('/growth', function()
{
    dd('Развитие');
});



//Route::post('/signup', [AuthController::class, 'signUp']);
//Route::post('/signin', [AuthController::class, 'signIn']);
//
//Route::get('signout', [AuthController::class, 'signOut']);
//Route::get('signout-from-all', [AuthController::class, 'signOutFromAll']);
//
//Route::group(['prefix' => 'example'], function() {
//    Route::get('/orders', [OrderController::class, 'get']);
//    Route::get('/orders-test', [OrderController::class, 'getTest']);
//    Route::get('/orders-collections', [OrderController::class, 'getCollection']);
//});
//
//// --------
//
//Route::group(['prefix' => 'categories'], function() {
//    Route::get(     '/{category}',  [CategoryController::class, 'get']);
//    Route::get(     '/',            [CategoryController::class, 'getAll']);
//    Route::post(    '/',            [CategoryController::class, 'create']);
//    Route::patch(   '/{category}',  [CategoryController::class, 'patch']);
//    Route::delete(  '/{category}',  [CategoryController::class, 'delete']);
//});
//
//Route::group(['prefix' => 'albums', 'middleware' => 'auth:api'], function() {
//    Route::get(     '/{album}',     [AlbumController::class, 'get']);
//    Route::post(    '/',            [AlbumController::class, 'create'])->middleware('role:admin');
//    Route::post(    '/{album}',     [AlbumController::class, 'multipleUpload']);
//});
//
//Route::group(['prefix' => '/images'], function() {
//    Route::get(         '/{id}',    [ImageController::class, 'download']);
//});
