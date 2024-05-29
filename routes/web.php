<?php

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
        Route::post('perform', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.perform');
        Route::get('trainer', [App\Http\Controllers\Auth\RegisterController::class, 'trainer'])->name('register.trainer');
    });
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');
    Route::resource('reviews', App\Http\Controllers\Frontend\ReviewController::class);
    Route::resource('assignments', App\Http\Controllers\Frontend\AssignmentController::class);
    Route::middleware([App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {
        Route::group(['prefix' => 'admin'], function(){
            Route::post('forgot-password/send-email', [App\Http\Controllers\Auth\LoginController::class, 'send_email'])->name('admin.forgot-password.email');
            Route::get('/', function(){return view('welcome');})->name('admin');
            Route::group(['prefix' => 'profile'], function(){
                Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'create'])->name('admin.profile');
                Route::post('perform', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.perform');
                Route::post('change/password', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('admin.profile.change.password');
                Route::post('picture/update', [App\Http\Controllers\Admin\ProfileController::class, 'picture_update'])->name('change-profile.picture');
            });
            Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
            Route::resource('steps', App\Http\Controllers\Admin\StepController::class);
            Route::resource('trainers', App\Http\Controllers\Admin\TrainerController::class);
            Route::resource('trainees', App\Http\Controllers\Admin\TraineeController::class);
            Route::resource('users', App\Http\Controllers\Admin\UserController::class);
            Route::resource('comments', App\Http\Controllers\Admin\CommentsController::class,['as' => 'admin']);
            Route::resource('reviews', App\Http\Controllers\Admin\ReviewsController::class,['as' => 'admin']);
            Route::resource('replies', App\Http\Controllers\Admin\ReplyController::class,['as' => 'admin']);
            Route::group(['prefix' => 'setting'], function(){
                Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'create'])->name('admin.setting');
                Route::post('perform', [App\Http\Controllers\Admin\SettingController::class, 'store'])->name('admin.setting.perform');
            });
            Route::group(['prefix' => 'students'], function(){
                Route::get('/', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.students');
                Route::get('steps', [App\Http\Controllers\Admin\StudentController::class, 'show'])->name('admin.students.steps');
            });
        });
    });
    Route::middleware([App\Http\Middleware\EnsureUserIsTrainee::class])->group(function () {
        Route::get('/', function(){return view('trainee.index');})->name('frontend');
        Route::group(['prefix' => 'course'], function(){
            Route::get('/', [App\Http\Controllers\Frontend\StepController::class, 'index'])->name('course');
            Route::get('details', [App\Http\Controllers\Frontend\StepController::class, 'show'])->name('course.detail');
        });
        Route::resource('comments',App\Http\Controllers\Frontend\CommentsController::class);
        Route::group(['prefix' => 'trainee'], function(){
            Route::get('/', [App\Http\Controllers\Trainee\DashboardController::class, 'index'])->name('trainee');
            Route::group(['prefix' => 'profile'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\ProfileController::class, 'create'])->name('trainee.profile');
                Route::post('perform', [App\Http\Controllers\Trainee\ProfileController::class, 'update'])->name('trainee.profile.perform');
                Route::post('change/password', [App\Http\Controllers\Trainee\ProfileController::class, 'show'])->name('trainee.profile.change.password');
                Route::post('picture/update', [App\Http\Controllers\Trainee\ProfileController::class, 'picture_update'])->name('trainee.change-profile.picture');
                Route::post('detail/update', [App\Http\Controllers\Trainee\ProfileController::class, 'detail_update'])->name('trainee.profile.detail.update');
            });
            Route::group(['prefix' => 'courses'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\CourseController::class, 'index'])->name('trainee.courses');
                Route::get('join', [App\Http\Controllers\Trainee\CourseController::class, 'create'])->name('trainee.courses.join');
            });
        });
    });

    Route::middleware([App\Http\Middleware\EnsureUserIsTrainer::class])->group(function () {
        Route::group(['prefix' => 'trainer'], function(){
            Route::get('/', [App\Http\Controllers\Trainer\DashboardController::class, 'index'])->name('trainer');
            Route::group(['prefix' => 'profile'], function(){
                Route::get('/', [App\Http\Controllers\Trainer\ProfileController::class, 'create'])->name('trainer.profile');
                Route::post('perform', [App\Http\Controllers\Trainer\ProfileController::class, 'update'])->name('trainer.profile.perform');
                Route::post('change/password', [App\Http\Controllers\Trainer\ProfileController::class, 'show'])->name('trainer.profile.change.password');
                Route::post('picture/update', [App\Http\Controllers\Trainer\ProfileController::class, 'picture_update'])->name('trainer.change-profile.picture');
                Route::post('detail/update', [App\Http\Controllers\Trainer\ProfileController::class, 'detail_update'])->name('trainer.profile.detail.update');
            });
        });
    });
});
