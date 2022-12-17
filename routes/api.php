<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
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

Route::get('/students',[StudentController::class, 'index']);
Route::get('/students/{student}',[StudentController::class,'show']);
Route::post('/students',[StudentController::class, 'store']);
Route::put('/students/{student}', [StudentController::class, 'update']);
Route::delete('/students/{student}',[StudentController::class, 'destroy']);

Route::get('/courses',[CourseController::class,'index']);
Route::get('/courses/{course}',[CourseController::class,'show']);
Route::post('/courses',[CourseController::class, 'store']);
route::put('/courses/{course}',[CourseController::class, 'update']);
route::delete('/courses/{course}',[CourseController::class,'destroy']);


Route::get('/enrollments',[EnrollmentController::class, 'index']);
Route::get('/enrollments/{enrollment}', [EnrollmentController::class, 'show']);
Route::post('/enrollments', [EnrollmentController::class, 'store']);
Route::put('/enrollments/{enrollment}',[EnrollmentController::class, 'update']);