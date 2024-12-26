<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'payments'], function(){
        Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments');
        Route::get('perform', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.perform');

        Route::post('coupon/apply', [App\Http\Controllers\PaymentController::class, 'show'])->name('payments.coupon.apply');
    });
    Route::group(['prefix' => 'financial-support'], function(){
        Route::get('{id}', [App\Http\Controllers\FinancialSupportController::class, 'show'])->name('financial-support');
        Route::post('{id}/perform', [App\Http\Controllers\FinancialSupportController::class, 'update'])->name('financial-support.perform');
    });
    Route::middleware([App\Http\Middleware\EnsureUserIsTrainee::class])->group(function () {
        Route::get('/', [App\Http\Controllers\Trainee\DashboardController::class, 'index'])->name('trainee');
        Route::group(['prefix' => 'course'], function(){
            Route::get('/', [App\Http\Controllers\Frontend\StepController::class, 'index'])->name('course');
            Route::get('details', [App\Http\Controllers\Frontend\StepController::class, 'show'])->name('course.detail');
        });
        Route::resource('comments',App\Http\Controllers\Frontend\CommentsController::class);
        Route::group(['prefix' => 'trainee'], function(){
            Route::get('/', [App\Http\Controllers\Trainee\DashboardController::class, 'index'])->name('trainee');
            Route::get('enroll/{id}', [App\Http\Controllers\Trainee\CourseController::class, 'store'])->name('trainee.enroll');
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
                Route::get('move/{id}', [App\Http\Controllers\Trainee\CourseController::class, 'move'])->name('trainee.courses.move');
                Route::post('move/perform', [App\Http\Controllers\Trainee\CourseController::class, 'move_perform'])->name('trainee.courses.move.perform');
            });
            Route::group(['prefix' => 'library'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\LibraryController::class, 'index'])->name('trainee.library');
            });
            
            Route::group(['prefix' => 'tasks'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\TaskController::class, 'index'])->name('trainee.tasks');
                Route::get('{id}', [App\Http\Controllers\Trainee\TaskController::class, 'show'])->name('trainee.tasks.show');
                Route::post('response', [App\Http\Controllers\Trainee\TaskController::class, 'store'])->name('trainee.tasks.response');
            });

            Route::group(['prefix' => 'financial-support'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\FinancialSupportController::class, 'index'])->name('trainee.financial-support');
            });

            Route::group(['prefix' => 'reports'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\ReportsController::class, 'index'])->name('trainee.reports');
            });
            
            Route::group(['prefix' => 'survey'], function(){
                Route::get('/', [App\Http\Controllers\Trainee\SurveyController::class, 'index'])->name('trainee.survey');
            });
        });
    });
});
