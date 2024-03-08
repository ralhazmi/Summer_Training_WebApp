<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\CommonQuestions;

class CommonQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Common=commonquestions::all();

        return view('dashcontent.CommonQuestions',compact('Common'),['user'=> auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashcontent.CommonQuestions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $commonquestion= new commonquestions;
        $commonquestion['question']=$request->question;
        $commonquestion['answer']=$request->answer;

        $commonquestion->save();
        return redirect()->route('commonindix');
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
