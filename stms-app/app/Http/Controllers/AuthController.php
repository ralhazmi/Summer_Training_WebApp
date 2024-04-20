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
            return redirect(route('dashboard'))->with("Success","You already logged in ");
        }
        return view('authusers.login');
    }

    function registeation(){
        if(Auth::check()){
            return redirect(route('dashboard'))->with("Success","You already logged in ");
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
        $user = Auth::user();

        if ($user->activation == 2) {
            // User is deactivated, log them out
            Auth::logout();
            return redirect()->back()->with("error",'Your account is deactivated. Contact Supervisor for assistance.');}
        return redirect()->intended(route('dashboard'))->with("Success","You loged in Succesffully");
      }
    return redirect()->back()->with("error","invalid credentials");
  }

  public function registrationPost(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|min:8|max:10|unique:users',
        'username' => 'required',
        'email' => 'required|email|unique:users',
        'major' => 'required',
        'hours' => [
            'required',
            function ($attribute, $value, $fail) {
                if ($value < 120) {
                    $fail($attribute . ' must be at least 120 hours.');
                }
            },
        ],
        'password' => 'required|min:8',
        'confirmpass' => 'required|same:password',
        'attachment' => 'nullable|file', // Ensure 'attachment' is a file
    ]);

    // Create a new User instance
    $data = new User();
    $data->id = $validatedData['id'];
    $data->username = $validatedData['username'];
    $data->email = $validatedData['email'];
    $data->major = $validatedData['major'];
    $data->hours = $validatedData['hours'];
    $data->password = Hash::make($validatedData['password']);

    // Handle file attachment
    if ($request->hasFile('attachment')) {
        $attachment = $request->file('attachment');
        $attachmentName = time() . '.' . $attachment->getClientOriginalExtension();
        $attachment->move('attachmentFile', $attachmentName);
        $data->attachment = $attachmentName;
    }
    // Save the user data to the database
    $userSaved = $data->save();


    if (!$userSaved) {
        return redirect('/register')->with("error", "Registration failed. Please try again.");
    }

    return redirect('/')->with("Success", "Registration successful!");
}

function logout(){
    Session::flush();
    Auth::logout();
    return redirect('/');
  }

}
