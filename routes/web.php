<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function() {
    Route::group(['prefix' => 'login'], function(){
        Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
        Route::post('perform', [App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.perform');
    });
    Route::group(['prefix' => 'register'], function(){
        Route::get('/', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'create'])->name('register');
        Route::post('perform', [App\Http\Controllers\Frontend\Auth\RegisterController::class, 'store'])->name('register.perform');
    });
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');

    Route::get('admin', function(){
        // Session::flush();
        // Auth::logout();
        // return Redirect('login');
        return view('welcome');
    })->name('admin');
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['prefix' => 'profile'], function(){
            Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'create'])->name('admin.profile');
            Route::post('perform', [App\Http\Controllers\Admin\ProfileController::class, 'store'])->name('admin.profile.perform');
        });
    });
    
});
