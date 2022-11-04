<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Backend\AjaxControler;
use App\Http\Controllers\Backend\AjaxController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

    //Route to redirect on laravel frontend
    Route::get('traders-hub', [AuthenticatedSessionController::class, 'autoLoggedin']);

});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

// Custom design
Route::get('admin-login-form', [App\Http\Controllers\Backend\BackendController::class, 'adminLoginForm'])->name('admin_login_nw');

// Route to login for laravel admin panel
Route::get('admin', [App\Http\Controllers\Backend\BackendController::class, 'index'])->name('admin_login');
Route::post('post-login', [App\Http\Controllers\Backend\BackendController::class, 'postLogin'])->name('login.post');
Route::post('admin/logout', [App\Http\Controllers\Backend\BackendController::class, 'logout'])->name('admin_logout');

// Routes for backend
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    
    Route::resource('dashboard', App\Http\Controllers\Backend\DashboardController::class);

    Route::resource('roles', App\Http\Controllers\Backend\RoleController::class);

    Route::resource('permissions', App\Http\Controllers\Backend\PermissionController::class);

    Route::resource('users', App\Http\Controllers\Backend\UserController::class);
    Route::post('remove-profile-img',[App\Http\Controllers\Backend\AjaxController::class,'uploadProfileImg'])->name('uploadProfileImg');

    Route::resource('meetings', App\Http\Controllers\Backend\LiveStreamController::class);

    Route::resource('courses', App\Http\Controllers\Backend\CourcesController::class);

    Route::resource('course-category', App\Http\Controllers\Backend\CoursesCategoriesController::class);

    Route::resource('topics', App\Http\Controllers\Backend\TopicController::class);

    Route::resource('posts',App\Http\Controllers\Backend\PostController::class);
    // Route::post('posts/update',[App\Http\Controllers\Backend\PostController::class,'update'])->name('postsUpdate');

    Route::resource('questions', App\Http\Controllers\Backend\QuestionControler::class);
    Route::post('remove-que-img', [App\Http\Controllers\Backend\AjaxController::class, 'uploadQuestionImg'])->name('uploadOptImg');

    Route::post('get-topics', [App\Http\Controllers\Backend\QuestionControler::class, 'getTopics'])->name('getTopics');
    Route::post('get-courses', [App\Http\Controllers\Backend\TopicController::class, 'getCourses'])->name('getCourses');

    Route::resource('option', App\Http\Controllers\Backend\OptionController::class);
    Route::post('remove-opt-img', [App\Http\Controllers\Backend\AjaxController::class, 'uploadOptionImg'])->name('RemoveOptImg');

    Route::post('get-questions', [App\Http\Controllers\Backend\OptionController::class, 'getQuestions'])->name('getQuestions');

    Route::resource('faq', App\Http\Controllers\Backend\FAQsController::class);

    Route::resource('video-post', App\Http\Controllers\Backend\VideoPostsController::class);

    Route::resource('profile', App\Http\Controllers\Backend\ProfileController::class);
    Route::post('profile/update',[App\Http\Controllers\Backend\ProfileController::class,'update'])->name('profileUpdate');
});
