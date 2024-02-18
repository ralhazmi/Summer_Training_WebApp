<?php

namespace App\Http\Controllers;

use App\Models\stmsUsers;
use Illuminate\Http\Request;

class stmsUserController extends Controller
{
    public function profile(){
        $users=stmsUsers::all();
        return view('userpages.personal',['users'=>$users]);
    }
}
