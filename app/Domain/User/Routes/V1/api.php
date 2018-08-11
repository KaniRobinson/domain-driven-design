<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
    
Route::middleware('guest')->group(function () {
    // 
});

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'User\UserController@index');
});
