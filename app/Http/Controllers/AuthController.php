<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use  Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);
        
        $credentials=$request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("dashboard"));
        }
        return redirect(route("login"))
            ->with("error","login Failed");
    }

    public function register()
    {
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phoneNumber"=>"required",
            "password"=>"required"
        ]);

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phoneNumber=$request->phoneNumber;
        $user->password=Hash::make($request->password);

        if($user->save()){
            return redirect(Route('login'))
            ->with("success","user created successfully");
        }
        else{
            return redirect(Route('register'))
            ->with("error","register failed");
        }
    


    }
}
