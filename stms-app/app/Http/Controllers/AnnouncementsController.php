<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\User;
use App\Notifications\announcementnoti;
use App\Http\Requests\CreateAnnouRequest;
use Illuminate\Support\Facades\Notification;



class AnnouncementsController extends Controller
{
    //supervisor->add,update,delete
    //student->show
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datann = Announcements::orderBy('created_at', 'desc')->paginate(5);
        return view('annou.Announcements',compact('datann'),['user'=> auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('annou.Announcements');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAnnouRequest $request)
    {
        $datatoinsert= new announcements;
        $datatoinsert['title']=$request->title;
        $datatoinsert['content']=$request->content;
        $datatoinsert['created_at']=date('Y-m-d H:i:s');
        $datatoinsert['updated_at']=date('Y-m-d H:i:s');
        $datatoinsert['attachment']=$request->attachment;
        $attachment = $request-> attachment;

        if( $attachment){
            $attachmentname=time().'.'. $attachment->getClientOriginalExtension();
            $request->attachment->move('attachmentFile',$attachmentname);
            $datatoinsert->attachment=$attachmentname;
        }
        $datatoinsert->user()->associate(auth()->user());
        $datatoinsert->save();

        //notification
        $users=User::where('id','!=',auth()->user()->id)->get();
        $Announcements = announcements::latest()->value('id');
        Notification::send($users,new announcementnoti($Announcements));

    
       return redirect()->route('indexannouncement')->with(['success'=>'added successfully']);
    }

    public function detailsannouncement($id)
    {
       $announcement = announcements::find($id);
      return view('annou.detailsannouncement', compact('announcement'),['user'=> auth()->user()]);
    }


    /**
     * Display the specified resource.
     */
    public function download(Request $request,$attachment)
    {

        return response()->download(public_path('attachmentFile/' .$attachment));
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
