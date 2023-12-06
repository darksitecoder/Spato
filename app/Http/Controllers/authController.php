<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Validator;
use Auth;

class authController extends Controller
{
    public function loginform()
    {

        return view('auth/loginForm');
    }

    function loginCheck(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            $user = Auth::user();
            $customToken = bin2hex(random_bytes(32)); // Generate a random token

        // Store the token in the session
        // $request->session()->put('custom_token', $customToken);
    
            // You can attach the token to the user's response if needed
            return redirect('api/home');
    
            // Alternatively, redirect with the token in the session or as a parameter
            // return redirect('main/successlogin')->with('token', $token);
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function home()
    {
        return view('index');   
    }

    function logout()
    {
        Auth::logout();
        return redirect('api/login');
    }
}
