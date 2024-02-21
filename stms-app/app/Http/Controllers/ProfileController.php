<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function profile(){
        return view('userpages.personal',['user'=> auth()->user()]);
    }
}
