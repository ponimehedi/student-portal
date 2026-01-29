<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester; 
use Illuminate\Support\Facades\Validator;

class SemesterController extends Controller
{
    //Get
    public function index() 
    {   
        // $semester = Semester::all()
        $semester = Semester::with('student')->get()->map(function($item){
            return [
                'id' => $item->id,
                'semester_name' => $item->semester_name,
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'students' => $item->student // Many to many relation e always returns a Collection of multiple objects/arrays, not a single object
            ];
        });

        if($semester->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'semester' => $semester
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
            'semester_name' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'student_id' => 'required'
        ]); 

        if($validation->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'validation failed',
                    'error' => $validation->errors()->messages()
                ]);
            } 

         $semester = Semester::create([
            'semester_name' => $request->semester_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        
         //  Attach the student
         // It will insert a row into 'semester_student_bridge'
         if($request->has('student_id')) 
            {
                $semester->student()->attach($request->student_id);
            }

        
        if($semester) 
            {
                return response()->json([
                    'success' => true,
                    'message' => 'semester created successfully'
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