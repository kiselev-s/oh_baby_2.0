<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/test', function () {
    return view('home_test');
});
Route::get('/test2', function () {
    return view('home_test2');
});



Route::get('/docs', function()
{
    return view('docs');
});
Route::get('/docs_test', function()
{
    return view('docs_test');
});
Route::get('/docs_test2', function()
{
    return view('docs_test2');
});



Route::get('/health', function()
{
    return view('health');
});
Route::get('/health_test', function()
{
    return view('health_test');
});
Route::get('/health_test2', function()
{
    return view('health_test2');
});



Route::get('/growth', function()
{
    return view('growth');
});
Route::get('/growth_test', function()
{
    return view('growth_test');
});
Route::get('/growth_test2', function()
{
    return view('growth_test2');
});


//Route::get('/test', function()
//{
//    return view('layout_test');
//});
