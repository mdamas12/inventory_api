<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
 
    public function index()
    {
        $features = Feature::all();
        return response()->json([
                'status' => true,
                'data' => $features
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
        $feature = Feature::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Feature created successfully',
            'data' => $feature
         ],201);
    }


    public function show(string $id)
    {
        $feature = Feature::find($id);
        return response()->json([
                'data' => $feature
             ],200); 
    }


    public function update(Request $request, string $id)
    {
        $feature = Feature::find($id);

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
        $feature->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Feature updated successfully',
            'data' => $feature
         ],200);
    }

    
    public function destroy(string $id)
    {
        $feature = Feature::find($id);
        $feature->delete();
        return response()->json([
            'status' => true,
            'message' => 'Feature deleted successfully',
         ],200);
    }
}
