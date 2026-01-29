<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; 
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    // Get
    public function index()
    {
      $course = Course::all()->map(function ($item){
        return [
           'id' => $item->id,
           'department_id' => $item->department_id,
           'department_code' => $item->department_code,
           'title' => $item->title,
           'credit' => $item->credit,
           'course_time' => $item->course_time,
           'course_fee' => $item->course_fee,
            //    
           'faculty_member_name' => $item->course->department->name, //nested relation,Faculty-Department-Course
           'department_Name' => $item->course->name
        ];
      }); 

       if($course->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'course' => $course
                ],200);
            } 

        else 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'No record found'
                ]);
            }   
    } 

    // Post 
    public function store(Request $request) 
    {
        $validation = Validator::make($request->all(),[
            'department_id' => 'required',
            'department_code' => 'required',
            'title' => 'required|string',
            'credit' => 'required',
            'course_time' => 'required|string',
            'course_fee' => 'required'
        ]); 

        if($validation->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'validation failed',
                    'error' => $validation->errors()->messages()
                ]);
            } 

        $course = Course::create([
            'department_id' => $request->department_id,
            'department_code' => $request->department_code,
            'title' => $request->title,
            'credit' => $request->credit,
            'course_time' => $request->course_time,
            'course_fee' => $request->course_fee
        ]); 

        if($course) 
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Course created successfully'
                ],200);
            } 
        else
            {
                return response()->json([
                    'success' => false,
                    'message'=>"something went wrong",
                ],500);
            }   
    }
}