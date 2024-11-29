<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailProduct;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createDetail(Request $request)
    {
        $rules =  [
            'product_id' => 'exists:products,id',
            'feature_id' => 'exists:features,id',
            'description' => 'string|max:100',
            'value' => 'string|max:30',
            'status' => 'boolean',
            
        ];
        $validator = Validator::make($request->all(), $rules, ['required' => 'El Campo :attribute es requerido', 'exists' => 'El/la :attribute no existe',]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'errors',
                'errors' => $validator->errors()->all()
             ],400);
           
        }
        $detail = DetailProduct::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Detail Product created successfully',
            'data' => $detail
         ],201);
    }

    /**
     * Display the specified resource.
     */
    public function listDetail(string $id)
    {
        $detail_list = DetailProduct::with('feature')->where('id_product','=',$id);
        return response()->json([
                'data' => $detail_list
             ],200); 
    }

    public function updateDetail(Request $request, string $id)
    {
        $detail = DetailProduct::find($id);
        $rules =  [
            'product_id' => 'exists:products,id',
            'feature_id' => 'exists:features,id',
            'description' => 'string|max:100',
            'value' => 'string|max:30',
            'status' => 'boolean',
            
        ];
        $validator = Validator::make($request->all(), $rules, ['required' => 'El Campo :attribute es requerido', 'exists' => 'El/la :attribute no existe',]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'errors',
                'errors' => $validator->errors()->all()
             ],400);
           
        }
        $detail->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Detail Product updated successfully',
            'data' => $detail
         ],200);
    }

    public function destroyDetail(string $id)
    {
        $detail = DetailProduct::find($id);
        $detail->delete();
        return response()->json([
            'status' => true,
            'message' => 'Detail Product deleted successfully',
         ],200);
    }
}
