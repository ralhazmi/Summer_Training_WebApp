<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Requests; // Assuming your model is named Requests and located in the app/Models directory

class RequestController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'request_title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            // Add any additional validation rules for your fields here
        ]);
        Requests::create($validatedData);
        // Create a new request instance with the validated data
        //$newRequest = Requests::create([
           // 'email' => $request->email,
           // 'request_title' => $request->request_title,
           // 'date' => $request->date,
           // 'content' => $request->content,
            // Add any additional fields you want to save here
        //]);

        // Optionally, you can redirect the user after storing the request
        return redirect()->back()->with('success', 'Request submitted successfully!');
    }

    
    
    
    public function index()
{
    // Fetch all previous requests
    $previousRequests = Requests::all();

    // Dump and die to check the fetched data
    //dd($previousRequests);

    // Pass previous requests to the view
return view('RQ', ['previousRequests' => $previousRequests]);
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
