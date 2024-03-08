<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonQuestions;
use App\Models\TrainingInstitution;
use App\Models\Announcements;
use App\Models\Requests;

class ProfileController extends Controller
{
    function profile(){
        return view('userpages.personal',['user'=> auth()->user()]);
    }
    function sideBar(){
        $data=Announcements::count();
        $previousRequests=Requests::count();
        $Common=commonquestions::all();
        $Training= traininginstitution::all();
        return view('Dash',compact('Common','Training','data','previousRequests'),['user'=> auth()->user()]);
    }
}
