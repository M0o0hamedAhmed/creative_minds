<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function index(){
  return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('mobile_number', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }


        public function logout(Request $request)
        {
            // Get the user token from the request headers
            $token = $request->_token;
            try {
                // Invalidate the user token
                JWTAuth::invalidate(JWTAuth::getToken());

                // Return a success response
                return response()->json(['success' => true, 'message' => 'Logged out successfully']);
            } catch (JWTException $e) {
                // Return an error response if the token could not be parsed or validated
                return response()->json(['success' => false, 'message' => 'Failed to log out'], 500);
            }
        }
//        Auth::guard('api')->logout();
//        return redirect("login");



}
