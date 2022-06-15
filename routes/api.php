<?php

use App\Http\Controllers\Api\V1\BadgeController;
use App\Http\Controllers\Api\V1\CategoryBookController;
use App\Http\Controllers\Api\V1\CategoryCourseController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\EnrollmentController;
use App\Http\Controllers\Api\V1\FinishedLectureController;
use App\Http\Controllers\Api\V1\LikeController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
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


  //profile  Api
  Route::get('profile', [ProfileController::class, 'show']);
  Route::put('profile', [ProfileController::class, 'update']);

  // get all the  book category
  Route::get('categoriesbooks',[CategoryBookController::class,'index']);

  // get all the  course category
  Route::get('categoriescourses',[CategoryCourseController::class,'index']);

  // create like
  Route::post('likes',[LikeController::class,'store']);
  Route::delete('likes/{id}',[LikeController::class,'destroy']);

  // create comment
  Route::post('comments',[CommentController::class,'store']);
  Route::delete('comments/{id}',[CommentController::class,'destroy']);

  // get all the post
  Route::get('posts',[PostController::class,'index']);

  // create enrollment
  Route::post('enrollments',[EnrollmentController::class,'store']);
  Route::delete('enrollments/{id}',[EnrollmentController::class,'destroy']);

  // logout
  Route::post('logout', [RegisterController::class, 'logout']);

  // max students badges
  Route::get('top-ten', function () {
    return [
        // Student::withCount('badges')->whereNull('book_id')->orderByDesc('badges_count')->limit(3)->get(),
        // Student::withCount('badges')->orderByDesc('badges_count')->limit(3)->get()
        Student::with('user')->withCount(['badges' => function($query){
                       $query->whereNull('course_id');
                                                        }])->orderByDesc('badges_count')->limit(3)->get(),
        Student::with('user')->withCount(['badges' => function($query){
                        $query->whereNull('book_id');
                                                         }])->orderByDesc('badges_count')->limit(3)->get()
        ];
  });

   // create finished lecture
   Route::post('finished_lecture',[FinishedLectureController::class,'store']);

   // get all the badge
   Route::get('badges',[BadgeController::class,'index']);


});


 // register
Route::post('register', [RegisterController::class, 'register']);

// login
Route::post('login', [LoginController::class, 'login']);


});





