<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
        {
           
        $rules = [
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string',
            ];
  
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'errors' => $validator->erros()->all()
                ],400);

            }
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->assignRole($request->role);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully', 
                'user' => $user, 
                'access_token' => $token, 
                'token_type' => 'Bearer'
            ],201);
        }

public function Register_customer(Request $request){

     $data =  $request->validate([
        'customer_type' => 'required|string|max:255',
        'speciality' => 'required|string|max:255',
        'plan_id' => 'required|integer',
        'name_company' => 'required|string|max:255|unique:customers',
        'treatment' => 'string|max:255',
        'user_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|string',
    ]);
}

public function login(Request $request)
{

    $rules = [
        'email' => 'required|string|email|max:100',
        'password' => 'required|string',
    ];

    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()){
        return response()->json([
            'status' => false,
            'errors' => $validator->erros()->all()
        ],400);

    }

    if(!Auth::attempt($request->only('email','password'))){
        return response()->json([
            'status' => false,
            'errors' => ['Unauthorized']
        ],401);
    }
    $user = User::where('email', $request->email)->first();

    $token = $user->createToken('auth_token')->plainTextToken;


    return response()->json([
        'status' => true,
        'message' => 'User Logged in successfully',
        'access_token' => $token, 
        'token_type' => 'Bearer',
        'data'=> $user 
    ],200);
}

 public function logout(){
    atth()->user()->tokens()->delete();
    return response()->json([
        'status' => true,
        'message' => 'User Logged out successfully',

    ],200);
 }
}
