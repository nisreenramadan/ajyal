<?php
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\LikeController;
use App\Http\Controllers\Admin\UserController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CategoryController;
=======
>>>>>>> 8b1bb7f4e74d2da926784277bf9abdf28c96a48f
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class, ['except' => ['show']]);
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('users/{user}/password', [UserController::class, 'password'])->name('users.password');
    Route::put('users/{user}/password', [UserController::class, 'password'])->name('users.password');
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('likes', LikeController::class);
<<<
<<<< HEAD
    Route::resource('courses', CourseController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('teachers', TeacherController::class);
=======
>>>>>>> 8b1bb7f4e74d2da926784277bf9abdf28c96a48f

});

// Route::group(['middleware' => 'auth', 'prefix' => '/admin', 'as' => 'admin.'], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');
//     Route::resource('users', UserController::class)->except('show');
//     Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');


//     Route::get('users/{user}/password', [UserController::class, 'password'])->name('users.password');
//     Route::put('users/{user}/password', [UserController::class, 'password'])->name('users.password');
//     Route::resource('users', UserController::class);
//     Route::resource('posts', PostController::class);
//     Route::resource('comments', CommentController::class);
//     Route::resource('likes', LikeController::class);

// });
