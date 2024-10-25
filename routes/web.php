<?php

use App\Http\Controllers\Admin\ZoomController;
use Illuminate\Support\Facades\Route;

Route::get('verify-account/{id}', [App\Http\Controllers\Auth\LoginController::class, 'verify']);
Route::group(['middleware' => ['guest']], function() {
    Route::get('forgot-password', [App\Http\Controllers\Auth\LoginController::class, 'forgot_password'])->name('forgot-password');
    Route::post('forgot-password/send-email', [App\Http\Controllers\Auth\LoginController::class, 'send_email'])->name('forgot-password.send-email');
    Route::get('reset-password/{id}', [App\Http\Controllers\Auth\LoginController::class, 'reset_password']);
    Route::post('reset-password/perform', [App\Http\Controllers\Auth\LoginController::class, 'change_password'])->name('reset-password.perform');

    Route::group(['prefix' => 'login'], function(){
        Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
        Route::post('perform', [App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.perform');
    });
    Route::group(['prefix' => 'register'], function(){
        Route::get('trainee', [App\Http\Controllers\Auth\RegisterController::class, 'trainee'])->name('register.trainee');
        Route::post('trainee_perform', [App\Http\Controllers\Auth\RegisterController::class, 'trainee_store'])->name('register.trainee_perform');
        Route::post('perform', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.perform');
        Route::get('trainer', [App\Http\Controllers\Auth\RegisterController::class, 'trainer'])->name('register.trainer');
    });
});
Route::group(['prefix' => 'workshop'], function(){
    Route::get('register/{uuid}', [App\Http\Controllers\WorkshopController::class, 'create'])->name('workshop.register');
    Route::post('register/{uuid}/perform', [App\Http\Controllers\WorkshopController::class, 'store'])->name('workshop.register.perform');
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');
    Route::resource('reviews', App\Http\Controllers\Frontend\ReviewController::class);
    Route::resource('assignments', App\Http\Controllers\Frontend\AssignmentController::class);
});
Route::get('create-meeting',[ZoomController::class,'createMetting']);
