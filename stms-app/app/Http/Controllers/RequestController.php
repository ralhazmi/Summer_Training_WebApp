<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\Requests; // Assuming your model is named Requests and located in the app/Models directory
use App\Http\Requests\CreateRequest;

class RequestController extends Controller
{
    public function store(CreateRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'request_title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            // Add any additional validation rules for your fields here
        ]);
        //Requests::create($validatedData);
        
        $datatoinsert= new requests;
        $datatoinsert['email']=$request->email;
        $datatoinsert['request_title']=$request->request_title;
        $datatoinsert['date']=date('Y-m-d H:i:s');
        $datatoinsert['content']=$request->content;
        $datatoinsert['attachment']=$request->attachment;
        $attachment = $request-> attachment;

        if( $attachment){
            $attachmentname=time().'.'. $attachment->getClientOriginalExtension();
            $request->attachment->move('attachmentFile',$attachmentname);
            $datatoinsert->attachment=$attachmentname;
        }
        $datatoinsert->save();
        return redirect()->route('indexrequest')->with(['success'=>'Request added successfully']);
    }

    public function download(Request $request,$attachment)
    {

        return response()->download(public_path('attachmentFile/' .$attachment));
    }

    
    public function create()
    {
    return view('req.RQ');
    }
    
    public function index()
     {
        $previousRequests=Requests::paginate(10);
        return view('req.RQ',compact('previousRequests'),['user'=> auth()->user()]);
    
    // Fetch all previous requests
    //$previousRequests = Requests::all();
    // return view('req.RQ', ['previousRequests' => $previousRequests]);
    }

    /*public function index()
      {
    // Retrieve all records from the requests table
    $requests = Requests::all();

    // Check if there are any records
    if ($requests->isEmpty()) {
        echo "There are no records in the requests table.";
    } else {
        // Records exist, you can proceed to use them
        foreach ($requests as $request) {
            // Process each request as needed
            echo "Request ID: $request->id, Title: $request->request_title <br>";
        }
    }
}*/
  
}
