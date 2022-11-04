<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Frontend\CoursesController;
use App\Http\Controllers\Frontend\QuizController;
use App\Http\Controllers\Frontend\TradingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LiveStreamFController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard', [Auth::user()->getRoleNames()]);
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {});
Route::get('/auth',[HomeController::class,'testAuth'])->name('authrole');
Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
Route::get('show-post/{id}',[HomeController::class,'show'])->name('showpost');
Route::post('/dashboard/show-post',[HomeController::class,'postget']);
Route::get('video-posts',[HomeController::class,'videoPosts'])->name('VideoPosts');
Route::post('post-like-dislike', [HomeController::class,'postLikeDislike']);
Route::post('getLikedUsers', [HomeController::class,'getLikeUsersImgs']);
// Route::get('/courses', function () {
//     return Inertia::render('Courses');
// })->name('courses');

Route::get('courses', [CoursesController::class, 'index'])->name('courses');
Route::get('view-courses/{id}', [CoursesController::class, 'show'])->name('show-courses');

Route::get('quizes', [QuizController::class, 'index'])->name('quizes');
Route::get('take-quiz/{id}', [QuizController::class, 'takeQuiz'])->name('take-quiz');
Route::get('getQue/{id}',[QuizController::class,'getQuestion']);
Route::post('/getQue/storeAnswer',[QuizController::class,'storeAnswer'])->name('storeAnswer');
Route::post('/getQue/storeResult',[QuizController::class,'storeResult'])->name('storeResult');
Route::get('/getR', function () {return Inertia::render('ShowResult', );})->name('getR');
Route::post('getQuizTime',[QuizController::class,'getQuizTime'])->name('getQuizTime');

Route::get('signals', [TradingController::class, 'UserSignals'])->name('userSignals');

Route::get('signal-reports', [TradingController::class, 'UserSignalReposrts'])->name('userSignalReposrts');

Route::get('affiliates', [TradingController::class, 'userAffiliateRefferals'])->name('userAffiliateRefferals');

Route::get('currency-heat-cal',[HomeController::class,'getCurrencyHeatCalculator'])->name('CurrencyHeatCal');

Route::get('faqs', [HomeController::class, 'getFaqs'])->name('faqs');

Route::get('podcast', [HomeController::class, 'getPodcast'])->name('podcast');
// profile routes
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'update'])->name('prupdate');
Route::post('profile/changepassword',[ProfileController::class,'changePassword'])->name('prchangePassword');

// post comment route
Route::post('storePostComment',[HomeController::class,'storePostComment'])->name('storePostComment');
Route::post('getPostComment',[HomeController::class,'getPostComment'])->name('getPostComment');
Route::post('postCommentLike',[HomeController::class,'postCommentLike'])->name('postCommentLike');
Route::post('getPostCommentLikes',[HomeController::class,'getPostCommentLikes'])->name('getPostCommentLikes');

// zoom meeting upcoming and previous show
Route::get('meetingshow',[LiveStreamFController::class,'index'])->name('meetingshow');



// Get imgs for frontend
Route::get('assets/{path}', function ($path) {
    return response()->file(public_path("uploads/$path"));
});

require __DIR__.'/auth.php';
