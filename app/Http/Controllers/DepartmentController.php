<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department; 
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    //Get 
    public function index()
    {    
         $department = Department::all()->map(function ($item){
            return [
                'id' => $item->id,
                'faculty_id' => $item->faculty_id,
                'departmentName' => $item->name, //Department name 
                'facultyName' => $item->department?->name //Faculty name 
            ];
         }); 

        if($department->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'department' => $department
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

    // post 
    public function store(Request $request) 
    {
         $validation = Validator::make($request->all(),[
            'faculty_id' => 'required',
            'name' => 'required|string'
        ]); 

        if($validation->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'validation failed',
                    'error' => $validation->errors()->messages()
                ]);
            } 

        $department = Department::create([
            'faculty_id' => $request->faculty_id,
            'name' => $request->name
        ]);  


        if($department) 
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Department created successfully'
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

    // Get By Id 
    public function show($id) 
    {
        $department = Department::find($id); 

       if(!$department) 
        {
            return response()->json([
               'success' => false,
               'message' => "No such faculty found",
            ],404);
        } 

        return response()->json([
              'success' => true,
              'department' => $department,
        ],200);
    } 

    // Edit 
    public function edit($id) 
    {
       $department = Department::find($id); 

       if(!$department) 
        {
            return response()->json([
               'success' => false,
               'message' => "No such department found",
            ],404);
        } 

        return response()->json([
              'success' => true,
              'department' => $department,
        ],200);
    } 

    // Update 
    public function update(Request $request,int $id) 
    {
        $validation = Validator::make($request->all(),[
            'faculty_id' => 'sometimes',
            'name' => 'sometimes|string'
        ]); 

        if($validation->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'validation failed',
                    'error' => $validation->errors()->messages()
                ]);
            } 

        $department = Department::find($id); 
        
        if($department) 
            {
                $department->update([
                    'faculty_id' => $request->faculty_id,
                    'name' => $request->name
                ]); 

                return response()->json([
                    'success' => true,
                     'message' => 'department updated successfully'
                ],200);
            } 
        else 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'No such department found'
                ],404);
            }
    }
}
