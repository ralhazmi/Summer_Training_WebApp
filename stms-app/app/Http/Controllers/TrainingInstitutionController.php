<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingInstitution;
use Illuminate\Support\Facades\Stroage;


class TrainingInstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Training= traininginstitution::all();
        return view('dashboard',compact('Training'),['user'=> auth()->user()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $TrainingInstitution= new traininginstitution;
        $TrainingInstitution['company_name']=$request->company_name;
        $TrainingInstitution['address']=$request->address;
        $TrainingInstitution['company_number']=$request->company_number;
        $TrainingInstitution['company_website']=$request->company_website;

        $TrainingInstitution->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
