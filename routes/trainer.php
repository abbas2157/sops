<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function() {
    Route::middleware([App\Http\Middleware\EnsureUserIsTrainer::class])->group(function () {
        Route::group(['prefix' => 'trainer'], function(){
            Route::get('/', [App\Http\Controllers\Trainer\DashboardController::class, 'index'])->name('trainer');

            Route::get('students', [App\Http\Controllers\Trainer\StudentController::class, 'index'])->name('trainer.students');
            Route::get('students/tasks/{id}', [App\Http\Controllers\Trainer\StudentController::class, 'show'])->name('trainer.students.tasks');

            Route::get('tasks/{id}', [App\Http\Controllers\Trainer\TaskController::class, 'show'])->name('trainer.tasks.check');
            Route::post('tasks/update/{id}', [App\Http\Controllers\Trainer\TaskController::class, 'update'])->name('trainer.tasks.update');

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