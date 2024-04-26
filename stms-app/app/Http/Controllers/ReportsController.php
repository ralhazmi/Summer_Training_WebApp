<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Reports;
use App\Http\Requests\CreateReport;
use App\Http\Requests\AddDegree;
use App\Notifications\reportsnoti;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportsController extends Controller
{
    //supervisor->add,update,delete
    //student->show
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $data=Reports::where('user_id', $userId)
        ->orWhere('userTo', $userId)
        ->paginate(10);

         // Retrieve userTo names for each request
         $userToNames = [];
         foreach ($data as $report) {
             $userToId = $report->userTo;
             $userToName = User::find($userToId)->username; // Assuming 'username' is the property you want to display
             $userToNames[$report->id] = $userToName;
         }

         $users = User::where('role', 2)->get();
        return view('Reports.index',compact('data','users', 'userToNames'),['user'=> auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->id();
        $data=Reports::where('user_id', $userId)
        ->orWhere('userTo', $userId)
        ->paginate(10);
        // Retrieve userTo names for each request
        $userToNames = [];
        foreach ($data as $report) {
            $userToId = $report->userTo;
            $userToName = User::find($userToId)->username; // Assuming 'username' is the property you want to display
            $userToNames[$report->id] = $userToName;
        }

        $users = User::where('role', 2)->get();
    return view('Reports.create',compact('users', 'userToNames'));
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
        // $datatoinsert['user_id']=$request->user_id;
        $datatoinsert['userTo']=$request->userTo;
        $attachment = $request-> attachment;
        // Associate the authenticated user with the request
        $datatoinsert->user()->associate(auth()->user());
        // Get the userTo ID from the request
        $userToId = $datatoinsert['userTo'];
        // Find the corresponding User model
        $userTo= User::find($userToId);
        $datatoinsert->supervisor()->associate($userTo);

        if( $attachment){
            $attachmentname=time().'.'. $attachment->getClientOriginalExtension();
            $request->attachment->move('attachmentFile',$attachmentname);
            $datatoinsert->attachment=$attachmentname;
        }
        
        $datatoinsert->save();


        //notification
        $ReportTo=Reports::latest()->value('userTo');
        $usersrep=User::where('id',$ReportTo)->get();
        $Reports = Reports::latest()->value('id');
        Notification::send($usersrep,new reportsnoti($Reports));


       return redirect()->route('Reportsindex')->with(['success'=>'added successfully']);

    }


    public function show($id)
    {
       $report = Reports::find($id);
       $userToId = $report->userTo;
        $userToName = User::find($userToId);
       return view('Reports.show', compact('report','userToName'),['user'=> auth()->user()]);
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
    // public function giveDegree(AddDegree $request, $id)
    // {
    //     try {
    //         $report = Reports::findOrFail($id);
    //         $report->degree = $request->degree;
    //         $report->save();

    //         return redirect()->back()->with('success', 'Degree saved successfully!');
    //     } catch (Exception $e) {
    //         // Log the error
    //         Log::error($e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to save degree.');
    //     }
    // }

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

    public function MarkAsRead_all(request $request)
    {
        $userUnreadNotification = auth()->user()->unreadNotifications;
        if($userUnreadNotification){
            $userUnreadNotification-> markAsRead();
            return back();
        }
    }


}
