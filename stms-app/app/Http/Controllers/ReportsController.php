<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Reports;
use App\Http\Requests\CreateReport;
use App\Http\Requests\AddDegree;


class ReportsController extends Controller
{
    //supervisor->add,update,delete
    //student->show
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Reports::all();
        return view('Reports.index',compact('data'),['user'=> auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('Reports.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateReport $request)
    {
        $datatoinsert= new Reports;
        $datatoinsert['report_title']=$request->report_title;
        $datatoinsert['date']=date('Y-m-d H:i:s');
        $datatoinsert['attachment']=$request->attachment;
        $datatoinsert['user_id']=$request->user_id;
        $datatoinsert['degree']=$request->degree;
        $attachment = $request-> attachment;

        if( $attachment){
            $attachmentname=time().'.'. $attachment->getClientOriginalExtension();
            $request->attachment->move('attachmentFile',$attachmentname);
            $datatoinsert->attachment=$attachmentname;
        }

        $datatoinsert->save();
       return redirect()->route('Reportsindex')->with(['success'=>'added successfully']);

    }

    
    public function show($id)
    {
       $report = Reports::find($id);
       return view('Reports.show', compact('report'),['user'=> auth()->user()]);
    }


    /**
     * Display the specified resource.
     */
    public function download(Request $request,$attachment)
    {

        return response()->download(public_path('attachmentFile/' .$attachment));
    }

    /**
     * Show the form for add the degree.
     */
    public function giveDegree(AddDegree $request, $id)
    {
        try {
            $report = Reports::findOrFail($id);
            $report->degree = $request->degree;
            $report->save();
        
            return redirect()->back()->with('success', 'Degree saved successfully!');
        } catch (\Exception $e) {
            // Log the error
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to save degree.');
        }
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
    public function update(Request $request)
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