<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;
use App\Models\Reply;
use App\Http\Requests\CreateRequest;

class RequestController extends Controller
{

     public function store(Request $request)
     {

         // Validate the incoming request data
         $validatedData = $request->validate([
            'userTo' => 'required',
            'request_title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'attachment' => 'nullable|file',
            // Add any additional validation rules for your fields here
        ]);;

         // Create a new request instance
         $newRequest = new Requests();
         $newRequest->userTo = $validatedData['userTo'];
         $newRequest->request_title = $validatedData['request_title'];
         $newRequest->date = $validatedData['date'];
         $newRequest->content = $validatedData['content'];

         // Associate the authenticated user with the request
         $newRequest->user()->associate(auth()->user());

         // Get the userTo ID from the request
         $userToId = $validatedData['userTo'];

         // Find the corresponding User model
         $userTo= User::find($userToId);

        //  // Associate the userTo with the request
        $newRequest->supervisor()->associate($userTo);

         // Handle attachment upload if provided
         if ($request->hasFile('attachment')) {
             $attachment = $request->file('attachment');
             $attachmentName = time() . '.' . $attachment->getClientOriginalExtension();
             $attachment->move('attachmentFile', $attachmentName);
             $newRequest->attachment = $attachmentName;
         }

         // Save the new request
         $newRequest->save();

         return redirect()->route('indexrequest')->with(['success' => 'Request added successfully']);
     }

    public function download(Request $request,$attachment)
    {

        return response()->download(public_path('attachmentFile/' .$attachment));
    }

    public function index()
    {
        $userId = auth()->id(); // Get the ID of the currently logged-in user

        // Retrieve requests created by or sent to the current user
        $previousRequests = Requests::where('user_id', $userId)
                                    ->orWhere('userTo', $userId)
                                    ->paginate(10);

        // Retrieve userTo names for each request
        $userToNames = [];
        foreach ($previousRequests as $request) {
            $userToId = $request->userTo;
            $userToName = User::find($userToId)->username; // Assuming 'username' is the property you want to display
            $userToNames[$request->id] = $userToName;
        }

        $users = User::where('role', 2)->get();

        return view('req.RQ', compact('previousRequests', 'users', 'userToNames'), ['user' => auth()->user()]);
    }

    public function requestsFilter(Request $request)
{
    $userId = auth()->id(); // Get the ID of the currently logged-in user

    // Retrieve requests created by or sent to the current user
    $query = Requests::where('user_id', $userId)->orWhere('userTo', $userId);
    // Filter requests based on status if provided
    if ($request->has('status')) {
        $status = $request->status;
        $previousRequests = Requests::where('request_status', $status)
        ->where(function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhere('userTo', $userId);
        })->paginate(10);
        }else {
        $previousRequests= $query->paginate(10);
    }



    // Retrieve userTo names for each request
    $userToNames = [];
    foreach ($previousRequests as $request) {
        $userToId = $request->userTo;
        $userToName = User::find($userToId)->username; // Assuming 'username' is the property you want to display
        $userToNames[$request->id] = $userToName;
    }

    $users = User::where('role', 2)->get();

    return view('req.RQ', compact('previousRequests', 'users', 'userToNames'), ['user' => auth()->user()]);
}


    public function requestdetails($id)
    {
        $request = requests::find($id);
        $userToId = $request->userTo;
        $userToName = User::find($userToId);
        $replies = Reply::where('request_id', $id)->get();
       return view('req.requestdetails', compact('request', 'replies','userToName'),['user'=> auth()->user()]);
    }




}
