<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    // Get
    public function index()
    {
        $faculties = Faculty::all()->map(function($item){
            return [
                 'id' => $item->id,
                 'name' => $item->name
            ];
        } ); 

        if($faculties->count() > 0)
            {
                return response()->json([
                    'success' => true,
                    'faculty' => $faculties
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
            // 'id' => 'required',
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

        $faculties = Faculty::create([
            // 'id' => $request->id,
            'name' => $request->name
        ]);  

        if($faculties) 
            {
                return response()->json([
                    'success' => true,
                    'message' => 'Faculties created successfully'
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
        $faculties = Faculty::find($id); 

       if(!$faculties) 
        {
            return response()->json([
               'success' => false,
               'message' => "No such faculty found",
            ],404);
        } 

        return response()->json([
              'success' => true,
              'faculties' => $faculties,
        ],200);
    } 

    // Edit 
    public function edit($id) 
    {
       $faculties = Faculty::find($id); 

       if(!$faculties) 
        {
            return response()->json([
               'success' => false,
               'message' => "No such faculty found",
            ],404);
        } 

        return response()->json([
              'success' => true,
              'faculties' => $faculties,
        ],200);
    } 

    // update 
    public function update(Request $request,int $id) 
    {
        $validation = Validator::make($request->all(),[
            // 'id' => 'sometimes',
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

        $faculties = Faculty::find($id); 
        
        if($faculties) 
            {
                $faculties->update([
                    // 'id' => $request->id,
                    'name' => $request->name
                ]); 

                return response()->json([
                    'success' => true,
                     'message' => 'Faculty updated successfully'
                ],200);
            } 
        else 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'No such faculty found'
                ],404);
            }

    } 

    // Delete
}
