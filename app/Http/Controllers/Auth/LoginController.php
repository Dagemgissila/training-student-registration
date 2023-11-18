<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function check(Request $request){
         $credentials=$request->validate([
            "email"=>"required|email",
            "password"=>"required"
         ]);

         if(Auth::attempt($credentials)){
           alert()->success('Login','Login Succesfully');
            return redirect()->route("dashboard");
         }
         else{
            return back()->with("error","invalid login detail");
         }
    }

    public function logout(Request $request){
         Auth::logout();
          return redirect()->route("login");
    }
}
