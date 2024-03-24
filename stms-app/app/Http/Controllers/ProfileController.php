<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonQuestions;
use App\Models\TrainingInstitution;
use App\Models\Announcements;
use App\Models\Requests;
use App\Models\Reports;


class ProfileController extends Controller
{
    function profile(){
        return view('userpages.personal',['user'=> auth()->user()]);
    }
    function sideBar(){
        $datann=Announcements::count();
        $previousRequests=Requests::count();
        $data=Reports::count();
        $Common=commonquestions::all();
        $Training= traininginstitution::all();
        return view('Dash',compact('Common','Training','datann','previousRequests','data'),['user'=> auth()->user()]);
    }
}
