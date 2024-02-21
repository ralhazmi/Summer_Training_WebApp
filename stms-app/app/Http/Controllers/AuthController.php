<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect('/personal');
        }
        return view('authusers.login');
    }
    function registeation(){
        if(Auth::check()){
            return redirect('/personal');
        }
        return view('authusers.registration');
    }

    function loginPost(Request $request){
      $request->validate([
        'email' => 'required|email',
        'password' => 'required',
      ]);

      $credentials = $request->only('email','password');
      if(Auth::attempt($credentials)){
        return redirect()->intended(route('personal.profile'));
      }
    return redirect()->back()->with("error","invalid credentials");
  }


  function registrationPost(Request $request){
    $request->validate([
        'id'=>'required|min:8|max:10|unique:users',
        'username'=> 'required',
        'email'=> 'required|email|unique:users',
        'major'=> 'required',
        'hours'=> [
            'required',
            function ($attribute, $value, $fail) {
                if ($value < 120) {
                    $fail($attribute . ' must be at least 120 hours.');
                }
            },
        ],
        'password' => 'required|min:8',
        'confirmpass' => 'required|same:password'
      ]);
      $data['id']= $request->id;
      $data['username']= $request->username;
      $data['email']= $request->email;
      $data['major']= $request->major;
      $data['hours']= $request->hours;
      $data['password']= Hash::make($request->password);

      $user = User::create($data);

      if (!$user){
        return redirect('/register')->with("error","Register faild,try again");
      }
      return redirect('/')->with("Success","Register Success");


}
function logout(){
    Session::flush();
    Auth::logout();
    return redirect('/');
  }

}
