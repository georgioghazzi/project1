<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class AdminLoginController extends Controller
{
    public function __construct(){
        
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
       
         return view('auth.admin-login');
    }
    
      
  

    public function login(Request $request){

            //Validate Form Data

            $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            //Attempt to log the user in
            if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=>$request->password ],$request->remember)){
                 //if succ => redirect to panel
                 return redirect()->intended(route('admin.dashboard'));
               }//if unsuc => redirect back to login.
            return redirect()->back()->withInput($request->only('email','remember'));           
            

            



    }


}
