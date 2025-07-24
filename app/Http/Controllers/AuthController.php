<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $data = $request->validated();  
        
        // Create company if user is admin
        if ($data['is_admin'] ?? false) {
            $company = Company::create(['name' => $data['company_name']]);
            $data['company_id'] = $company->id;
        } else {
            // For non-admin users, you might want to:
            // 1. Require company_id in request
            // 2. Or assign to a default company
           $data['company_id'] = 1;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'company_id' => $data['company_id'],
            'is_admin' => $data['is_admin'] ?? false,
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'company' => $user->company
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([ 
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'token' => $request->user()->createToken('api')->plainTextToken
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
