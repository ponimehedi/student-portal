<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // get 
    public function index()
    {   
        //$student = Student::all()
        $student = Student::with('semester')->get()->map(function($item){
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'address' =>$item->address,
                'phone' => $item->phone,
                'gender' => $item->gender,
                'semesters' => $item->semester // Many to many relation e always returns a Collection of multiple objects/arrays, not a single object
            ];
        }); 

        if($student->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'student' => $student
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
            'name' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'semester_id' => 'required'
        ]); 

        if($validation->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'validation failed',
                    'error' => $validation->errors()->messages()
                ]);
            } 
        
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->address,
            'gender' => $request->gender
        ]); 

         //  Attach the semester
         // It will insert a row into 'semester_student_bridge'
         if($request->has('semester_id')) 
            {
                $student->semester()->attach($request->semester_id);
            }

        if($student) 
            {
                return response()->json([
                    'success' => true,
                    'message' => 'student created successfully'
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