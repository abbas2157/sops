<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function() {
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
                Route::get('show', [App\Http\Controllers\Trainee\CourseController::class, 'show'])->name('trainee.courses.show');
            });
            Route::group(['prefix' => 'library'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\LibraryController::class, 'index'])->name('trainee.library');
            });
            Route::group(['prefix' => 'tasks'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\TaskController::class, 'index'])->name('trainee.tasks');
                Route::get('{id}', [App\Http\Controllers\Trainee\TaskController::class, 'show'])->name('trainee.tasks.show');
            });
        });
    });
});