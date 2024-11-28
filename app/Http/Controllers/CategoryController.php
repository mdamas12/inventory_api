<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
 
    public function index()
    {
        $categories = Category::all();
        return response()->json([
                'status' => true,
                'data' => $categories
        ],200); 
    }

   
    public function store(Request $request)
    {
        $rules =  [
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:100',
            'status' => 'boolean'
        ];
        $validator = Validator::make($request->all(), $rules, ['required' => 'El Campo :attribute es requerido']);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'errors',
                'errors' => $validator->errors()->all()
             ],400);
           
        }
        $category = Category::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Category created successfully',
            'data' => $category
         ],201);
    }


    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json([
                'data' => $category
             ],200); 
    }

    
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $rules =  [
            'name' => 'required|string|max:30',
            'description' => 'required|string|max:100',
            'status' => 'boolean'
        ];
        
        $validator = Validator::make($request->all(), $rules, ['required' => 'El Campo :attribute es requerido']);

        if($validator->fails()){
            return response()->json([
               'status' => false,
               'message' => 'errors',
               'errors' => $validator->errors()->all()
            ],400);
        }
        $category->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Category updated successfully',
            'data' => $category
         ],200);
    }

   
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully',
         ],200);
    }
}
