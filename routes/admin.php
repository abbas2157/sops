<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function() {
    Route::middleware([App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {
        Route::group(['prefix' => 'admin'], function(){
            Route::post('forgot-password/send-email', [App\Http\Controllers\Auth\LoginController::class, 'send_email'])->name('admin.forgot-password.email');
            Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
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
            Route::resource('coupons', App\Http\Controllers\Admin\CouponController::class,['as' => 'admin']);
            Route::resource('replies', App\Http\Controllers\Admin\ReplyController::class,['as' => 'admin']);
            Route::resource('batches', App\Http\Controllers\Admin\BatchController::class,['as' => 'admin']);
            Route::resource('batch-students', App\Http\Controllers\Admin\BatchStudentsController::class,['as' => 'admin']);
            Route::resource('class-schedules', App\Http\Controllers\Admin\ClassScheduleController::class,['as' => 'admin']);
            Route::resource('library',App\Http\Controllers\Admin\LibraryController::class,['as' => 'admin']);

            Route::group(['prefix' => 'tasks'], function(){
                Route::get('/', [App\Http\Controllers\Admin\TaskController::class, 'index'])->name('admin.tasks');

                Route::get('{id}', [App\Http\Controllers\Admin\TaskController::class, 'show'])->name('admin.tasks.check');
                Route::post('update/{id}', [App\Http\Controllers\Admin\TaskController::class, 'update'])->name('admin.tasks.update');
            });

            Route::group(['prefix' => 'setting'], function(){
                Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'create'])->name('admin.setting');
                Route::post('perform', [App\Http\Controllers\Admin\SettingController::class, 'store'])->name('admin.setting.perform');
            });
            Route::group(['prefix' => 'students'], function(){
                Route::get('/', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.students');
                Route::get('steps', [App\Http\Controllers\Admin\StudentController::class, 'show'])->name('admin.students.steps');
            });
            Route::group(['prefix' => 'payments'], function(){
                Route::get('{id}', [App\Http\Controllers\Admin\PaymentController::class, 'show'])->name('admin.payments');
                Route::post('{id}/', [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('admin.payments.store');
            });
            Route::group(['prefix' => 'financial-support'], function(){
                Route::get('/', [App\Http\Controllers\Admin\FinancialSupportController::class, 'index'])->name('admin.financial-support');
                Route::get('{id}/show', [App\Http\Controllers\Admin\FinancialSupportController::class, 'show'])->name('admin.financial-support.show');
                Route::post('{id}/update', [App\Http\Controllers\Admin\FinancialSupportController::class, 'update'])->name('admin.financial-support.update');
            });

            Route::group(['prefix' => 'workshops'], function(){
                Route::get('/', [App\Http\Controllers\Admin\WorkshopController::class, 'index'])->name('admin.workshops');

                Route::get('google-auth',[App\Http\Controllers\Admin\WorkshopController::class, 'authenticate'])->name('admin.workshops.google-auth');
                Route::post('store', [App\Http\Controllers\Admin\WorkshopController::class, 'store'])->name('admin.workshops.store');

                Route::get('show/{uuid}', [App\Http\Controllers\Admin\WorkshopController::class, 'show'])->name('admin.workshops.show');
                Route::get('cancel/{uuid}', [App\Http\Controllers\Admin\WorkshopController::class, 'cancel'])->name('admin.workshops.cancel');
            });

            Route::group(['prefix' => 'reports'], function(){
                Route::get('{uuid}', [App\Http\Controllers\Admin\ReportController::class, 'show'])->name('admin.reports');
            });
        });
    });
});
