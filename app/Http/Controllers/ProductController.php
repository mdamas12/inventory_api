<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('categoty')->get();
        return response()->json([
                'status' => true,
                'data' => $products
        ],200); 
    }


    public function store(Request $request)
    {
        $rules =  [
            'name' => 'required|string|max:30',
            'category_id' => 'exists:categories,id',
            'description' => 'required|string|max:100',
            'status' => 'boolean',
            'price' => 'numeric',
            'stock' => 'integer',
            'min_stock' => 'integer',
            
        ];
        $validator = Validator::make($request->all(), $rules, ['required' => 'El Campo :attribute es requerido', 'exists' => 'la categoria no existe',]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'errors',
                'errors' => $validator->errors()->all()
             ],400);
           
        }
        $product = Product::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => $product
         ],201);
    }

 
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json([
                'data' => $product
             ],200); 
    }


    public function update(Request $request, string $id)
    {

        $product = Product::find($id);
        $rules =  [
            'name' => 'required|string|max:30',
            'category_id' => 'exists:categories,id',
            'description' => 'required|string|max:100',
            'status' => 'boolean',
            'price' => 'numeric',
            'stock' => 'integer',
            'min_stock' => 'integer',
            
        ];
        $validator = Validator::make($request->all(), $rules, ['required' => 'El Campo :attribute es requerido', 'exists' => 'la categoria no existe',]);

        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'errors',
                'errors' => $validator->errors()->all()
             ],400);
           
        }
        $product->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product
         ],201);
    }
    
    public function update_stock(Request $request, string $id)
    {

        $product = Product::find($id);
        $stock = $product->stock + $request->quantity;
        $product->update(['stock' => $stock]);
        return response()->json([
            'status' => true,
            'message' => 'Stock Product updated successfully',
            'data' => $product
         ],201);

    }
  
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
         ],200);
    }
}
