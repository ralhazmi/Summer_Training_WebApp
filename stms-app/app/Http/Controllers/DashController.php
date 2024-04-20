<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CommonQuestions;
use App\Models\TrainingInstitution;
use App\Models\Announcements;
use App\Models\Requests;
use App\Models\Reports;






class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $datann=Announcements::count();
        $previousRequests=Requests::where('user_id', $user->id)
        ->orWhere('userTo', $user->id)
        ->count();
        $data=Reports::where('user_id', $user->id)
        ->orWhere('userTo', $user->id)
        ->count();
        $Common=commonquestions::all();
        $Training= traininginstitution::all();
        return view('Dash',compact('Common','Training','datann','previousRequests','data'),['user'=> auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dash');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {//

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
