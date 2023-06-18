<?php

use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class,"index"]);


Route::middleware(['auth'])->group(function () {

//HOME ROUTES----------------------------------------------------
Route::get('/index', [HomeController::class,"index"]);
Route::get('/mainDashboard', [HomeController::class,"mainDashboard"]);
Route::get('logout', [HomeController::class,"logout"]);
Route::post('/gusm', [App\Http\Controllers\UserController::class, 'getName']);

//----------------------------------------------------------------

//PROFILE ROUTES----------------------------------------------------
Route::get('/profile', [App\Http\Controllers\UserController::class,'index'])->middleware('auth')->name('profile.show');
Route::post('/profile/update-info', [App\Http\Controllers\UserController::class,'updateInfo'])->name('update.info')->middleware('auth');
Route::get('/profile/users', [App\Http\Controllers\UserController::class,'visite'])->middleware('auth');
Route::get('/profile/users/message', [App\Http\Controllers\UserController::class,'message'])->middleware('auth');
Route::post('/profile/update-image', [App\Http\Controllers\UserController::class,'updateImage'])->name('profile.image')->middleware('auth');
Route::get('/people', [App\Http\Controllers\PeopleController::class, 'index'])->name('people');
Route::get('/people/all', [App\Http\Controllers\PeopleController::class, 'fetch'])->name('people.all');
Route::get('/people/search', [App\Http\Controllers\PeopleController::class, 'search'])->name('people.search');

//FORUMS ROUTES----------------------------------------------------------------
Route::post('/post/create', [App\Http\Controllers\PostController::class,'store'])->name('post.create')->middleware('auth');
Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class,'showEdit'])->name('post.edit')->middleware('auth');
Route::get('/post/{post}/delete', [App\Http\Controllers\PostController::class,'destroy'])->name('post.delete')->middleware('auth');
Route::post('/post/{post}/edit/submit-edition', [App\Http\Controllers\PostController::class,'edit'])->name('post.edit.confirm')->middleware('auth');
Route::post('/post/{post}/replies', [App\Http\Controllers\ReplyController::class,'store'])->name('reply.add')->middleware('auth');
Route::get('/post/{post}/delete-comment/{reply}', [App\Http\Controllers\ReplyController::class,'destroy'])->name('reply.delete')->middleware('auth');
Route::post('/post/{post}/edit-comment/{reply}', [App\Http\Controllers\ReplyController::class,'edit'])->name('reply.edit')->middleware('auth');
Route::post('/post/{post}/update-upvotes', [App\Http\Controllers\PostController::class,'upvote'])->name('update.upvotes')->middleware('auth');
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/post/search', [App\Http\Controllers\PostController::class, 'search'])->name("post.search");
Route::get('/post/user', [App\Http\Controllers\UserController::class, 'fetch'])->name("post.user");
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

//DASHBOARD ROUTES--------------------------------
Route::get('/blog', [DashboardController::class,"blog"]);

//MAIN ROUTES-----------------------------------------------------
Route::get('/main', [HomeController::class, "main"]);

//COURSE ROUTES--------------------------------
Route::get('/courses', [CourseController::class,"courses"])->name('courses');
Route::get('/newcourse', [CourseController::class,"newcourse"]);
Route::post('/courses/create', [CourseController::class, 'store'])->name('courses.store');
Route::get('/coursedetails/{id}',[CourseController::class,"coursedetails"]);
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::post('/courses/filter', [ CourseController::class])->name('courses.filter');


//USER ROUTES
Route::get('/teacher/{id}', [UserController::class, 'getTeacher'])->name('teacher.get');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/env', function () {
    return response()->json([
        'SECRET_KEY' => env('SECRET_KEY'),
    ]);});



    Route::get('/calendar/chart', [\App\Http\Controllers\CalendarController::class, 'chart'])->name('chart');
    Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
    Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
    
    Route::get('terms', function(){ return view('termsOfUse'); })->name('terms');
    
