<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\Requests; // Assuming your model is named Requests and located in the app/Models directory
use App\Http\Requests\CreateRequest;

class RequestController extends Controller
{
     // Define constants for status codes
     const STATUS_OPEN = 1;
     const STATUS_PENDING = 2;
     const STATUS_CLOSED = 3;
 
    public function store(CreateRequest $request)
    {
        // Your existing code...

        // Map string status to integer code
        switch ($request->request_status) {
            case 'open':
                $status = self::STATUS_OPEN;
                break;
            case 'pending':
                $status = self::STATUS_PENDING;
                break;
            case 'closed':
                $status = self::STATUS_CLOSED;
                break;
            default:
                $status = self::STATUS_OPEN; // Default to open if status is not recognized
                break;
        }

        // Assign the mapped status code to the request model

        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'request_title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'attachment' => 'nullable|file|max:2048',
            // Add any additional validation rules for your fields here
        ]);
        //Requests::create($validatedData);
        //$validatedData['request_status'] = 'open';

        $datatoinsert= new requests;
        $datatoinsert['email']=$request->email;
        $datatoinsert['request_title']=$request->request_title;
        $datatoinsert['date']=date('Y-m-d H:i:s');
        $datatoinsert['content']=$request->content;
        $datatoinsert['attachment']=$request->attachment;
        $datatoinsert->request_status = $status;
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
    public function requestdetails($id)
    {
       $request = requests::find($id);
       return view('req.requestdetails', compact('request'),['user'=> auth()->user()]);
    }



    // Controller method to update request status
    public function updatestatus(Request $request, $id)
    {
    // Validate the incoming request data (optional)
    $validatedData = $request->validate([
        'request_status' => 'required|integer', // Ensure request_status is an integer
    ]);

    // Map string status to integer value
    $statusMapping = [
        'open' => 1,
        'pending' => 2,
        'closed' => 3,
    ];

    // Retrieve the request by ID
    $requestToUpdate = Requests::findOrFail($id);

    // Update the request status
    $requestToUpdate->request_status = $statusMapping[$request->request_status];
    $requestToUpdate->save();

    return redirect()->back()->with(['success' => 'Request status updated successfully']);
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
    public function fetchDetails($id)
{
    $request = Request::findOrFail($id);
    return response()->json($request);
}

}*/

}
