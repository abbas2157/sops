<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function() {
    Route::get('forgot-password', [App\Http\Controllers\Auth\LoginController::class, 'forgot_password'])->name('forgot-password');
    Route::post('forgot-password/send-email', [App\Http\Controllers\Auth\LoginController::class, 'send_email'])->name('forgot-password.send-email');
    Route::get('reset-password/{id}', [App\Http\Controllers\Auth\LoginController::class, 'reset_password']);
    Route::post('reset-password/perform', [App\Http\Controllers\Auth\LoginController::class, 'change_password'])->name('reset-password.perform');
    Route::get('verify/{id}', [App\Http\Controllers\Auth\LoginController::class, 'verify']);
    
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
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/', function(){return view('welcome');})->name('admin');
        Route::group(['prefix' => 'profile'], function(){
            Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'create'])->name('admin.profile');
            Route::post('perform', [App\Http\Controllers\Admin\ProfileController::class, 'store'])->name('admin.profile.perform');
        });
        Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
    });
});
