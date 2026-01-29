<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');  

// Faculty 
Route::get('faculties',[FacultyController::class,'index']);
Route::post('faculties',[FacultyController::class,'store']);
Route::get('faculties/{id}',[FacultyController::class,'show']);
Route::get('faculties/{id}/edit',[FacultyController::class,'edit']);
Route::put('faculties/{id}/edit',[FacultyController::class,'update']);

// Department
Route::get('department',[DepartmentController::class,'index']);
Route::post('department',[DepartmentController::class,'store']);
Route::get('department/{id}',[DepartmentController::class,'show']);
Route::get('department/{id}/edit',[DepartmentController::class,'edit']);
Route::put('department/{id}/edit',[DepartmentController::class,'update']);

// Course 
Route::get('course',[CourseController::class,'index']);
Route::post('course',[CourseController::class,'store']);

// Student 
Route::get('student',[StudentController::class,'index']);
Route::post('student',[StudentController::class,'store']);

// Semester 
Route::get('semester',[SemesterController::class,'index']); 
Route::post('semester',[SemesterController::class,'store']);