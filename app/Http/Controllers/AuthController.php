<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller
{
    //
    /**
     * Login
        * @bodyParam email  string required The email of the user. Example: test@example.com
        * @bodyParam password  string required Example: Saumil#Jain@123
        * @unauthenticated
        
     */
    public function login(Request $request)
    {   
        
        $user = User::where('email', $request['email'])->first();
        if(empty($user)){
            return response()->json(['message' => 'Invalid login details']);    
        }
        
        if(Auth::attempt($request->all())){
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    }
}
