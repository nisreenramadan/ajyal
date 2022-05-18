<?php

use App\Http\Controllers\Api\V1\CategoryBookController;
use App\Http\Controllers\Api\V1\CategoryCourseController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\EnrollmentController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function () {
Route::group(['middleware' => 'auth:sanctum'], function () {

// Route::get('categoriesbooks',[CategoryBookController::class,'index']);
// Route::get('categoriesbooks/{id}',[CategoryBookController::class,'show']);

//   // get all the  course category
//   Route::get('categoriescourses',[CategoryCourseController::class,'index']);
//   Route::get('categoriescourses/{id}',[CategoryCourseController::class,'show']);

//   // get all the lecture
//   Route::get('courses/{id}',[CourseController::class,'show']);

//   // create like
//   Route::post('likes',[LikeController::class,'store']);

//   // create comment
//   Route::post('comments',[CommentController::class,'store']);

//   // get all the post
//   Route::get('posts',[PostController::class,'index']);
//   Route::get('posts/{id}',[PostController::class,'show']);

//   // create enrollment
//   Route::post('enrollments',[EnrollmentController::class,'store']);

//   // logout
//   Route::post('logout', [RegisterController::class, 'logout']);

  //profile  Api
// Route::get('profile/{id}', [ProfileController::class, 'show']);
// Route::put('profile/{id}', [ProfileController::class, 'update']);
});


 // register
Route::post('register', [RegisterController::class, 'register']);

// login
Route::post('login', [LoginController::class, 'login']);

//profile  Api
Route::get('profile/{id}', [ProfileController::class, 'show']);
Route::put('profile', [ProfileController::class, 'update']);


Route::get('categoriesbooks',[CategoryBookController::class,'index']);
Route::get('categoriesbooks/{id}',[CategoryBookController::class,'show']);

  // get all the  course category
  Route::get('categoriescourses',[CategoryCourseController::class,'index']);
  Route::get('categoriescourses/{id}',[CategoryCourseController::class,'show']);

  // get all the lecture
  Route::get('courses/{id}',[CourseController::class,'show']);

  // create like
  Route::post('likes',[LikeController::class,'store']);

  // create comment
  Route::post('comments',[CommentController::class,'store']);

  // get all the post
  Route::get('posts',[PostController::class,'index']);
  Route::get('posts/{id}',[PostController::class,'show']);

  // create enrollment
  Route::post('enrollments',[EnrollmentController::class,'store']);

  // logout
  Route::post('logout', [RegisterController::class, 'logout']);

  // max students badges
  Route::get('top-ten', function () {
    return Student::withCount('badges')->orderByDesc('badges_count')->limit(10)->get();
  });
});





