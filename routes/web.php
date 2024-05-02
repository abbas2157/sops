<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function() {
    Route::get('forgot-password', [App\Http\Controllers\Auth\LoginController::class, 'forgot_password'])->name('forgot-password');
    Route::post('forgot-password/send-email', [App\Http\Controllers\Auth\LoginController::class, 'send_email'])->name('forgot-password.send-email');
    Route::get('reset-password/{id}', [App\Http\Controllers\Auth\LoginController::class, 'reset_password']);
    Route::post('reset-password/perform', [App\Http\Controllers\Auth\LoginController::class, 'change_password'])->name('reset-password.perform');
    Route::get('verify-account/{id}', [App\Http\Controllers\Auth\LoginController::class, 'verify']);
    
    Route::group(['prefix' => 'login'], function(){
        Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
        Route::post('perform', [App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.perform');
    });
    Route::group(['prefix' => 'register'], function(){
        Route::get('trainee', [App\Http\Controllers\Auth\RegisterController::class, 'trainee'])->name('register.trainee');
        Route::post('perform', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.perform');
    });
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');

    Route::middleware([App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {
        Route::group(['prefix' => 'admin'], function(){
            Route::get('/', function(){return view('welcome');})->name('admin');
            Route::group(['prefix' => 'profile'], function(){
                Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'create'])->name('admin.profile');
                Route::post('perform', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.perform');
                Route::post('change/password', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('admin.profile.change.password');
                Route::post('picture/update', [App\Http\Controllers\Admin\ProfileController::class, 'picture_update'])->name('change-profile.picture');
            });
            Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
            Route::resource('intro-modules', App\Http\Controllers\Admin\Modules\IntroController::class);
            Route::resource('trainers', App\Http\Controllers\Admin\TrainerController::class);
            Route::resource('trainees', App\Http\Controllers\Admin\TraineeController::class);
        });
    });
    Route::middleware([App\Http\Middleware\EnsureUserIsTrainee::class])->group(function () {
        Route::get('/', function(){return view('frontend.module.intro.index');})->name('frontend');
        Route::group(['prefix' => 'frontend'], function(){
            Route::get('details', [App\Http\Controllers\Frontend\IntroController::class, 'show'])->name('course.detail');
        });
        Route::group(['prefix' => 'trainee'], function(){
            Route::get('/', function(){return view('trainee.index');})->name('trainee');
            Route::group(['prefix' => 'profile'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\ProfileController::class, 'create'])->name('trainee.profile');
                Route::post('perform', [App\Http\Controllers\Trainee\ProfileController::class, 'update'])->name('trainee.profile.perform');
                Route::post('change/password', [App\Http\Controllers\Trainee\ProfileController::class, 'show'])->name('trainee.profile.change.password');
                Route::post('picture/update', [App\Http\Controllers\Trainee\ProfileController::class, 'picture_update'])->name('trainee.change-profile.picture');
                Route::post('detail/update', [App\Http\Controllers\Trainee\ProfileController::class, 'detail_update'])->name('trainee.profile.detail.update');
            });
            Route::group(['prefix' => 'courses'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\CourseController::class, 'index'])->name('trainee.courses');
            });
        });
    });
});
