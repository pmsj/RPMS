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
    //I added this
    // if(Features::enabled(Features::updatePassword()))
    // {
    //     Route::put('/user/password', [PasswordController::class, 'update'])
        
    //     ->name('user-password.update');
    // }
    return $request->user();

});
