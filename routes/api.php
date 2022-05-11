<?php

use App\Http\Controllers\Api\V1\CategoryBookController;
use App\Http\Controllers\Api\V1\CategoryCourseController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\EnrollmentController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    // get all the  book category
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
});
