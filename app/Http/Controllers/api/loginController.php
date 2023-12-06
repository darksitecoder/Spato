<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;


class loginController extends Controller
{
    public function registerForm()
    {
        return view('login/registerForm');
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }



    public function submitRegistration(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'fName' => 'required|string',
            'lName' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'captcha' => 'required',
        ]);


        if ($validator->fails()) {
            // Return validation errors in the response
            return response()->json($validator->errors());
        }

        // Create a new user
        $user = User::create([
            'name' => $request->input('fName') . ' ' . $request->input('lName'),
            'mobile' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

       
        $email =  $request->input('email'); // Add more dynamic data as needed
      
 

       $message= Mail::to($email)->send(new EmailVerification($email));
        // dd($message);
       

        return response()->json(['message' => 'User registered successfully']);
    }


    public function loginform()
    {

        return view('login/loginForm');
    }
   
        function loginCheck(Request $request)
        {
           
            // $this->validate($request, [
            //     'email'   => 'required|email',
            //     'password'  => 'required|alphaNum|min:3'
            // ]);
    
            $user_data = array(
                'email'  => $request->email,
                'password' => $request->password
            );

         
    
            if (Auth::attempt($user_data)) {
                $user = Auth::user();

                $customToken = bin2hex(random_bytes(32)); 
    
                return response()->json(['success'=>'Login Successfull','token'=>$customToken]);
        
          
            } else {
                return response()->json(['error'=>'User Credential Mis Matched']);
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
