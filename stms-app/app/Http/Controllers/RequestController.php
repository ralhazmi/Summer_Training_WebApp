<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests; // Assuming your model is named Requests and located in the app/Models directory

class RequestController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'request_title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            // Add any additional validation rules for your fields here
        ]);

        // Create a new request instance with the validated data
        $newRequest = Requests::create([
            'email' => $request->email,
            'request_title' => $request->request_title,
            'date' => $request->date,
            'content' => $request->content,
            // Add any additional fields you want to save here
        ]);

        // Optionally, you can redirect the user after storing the request
        return redirect()->back()->with('success', 'Request submitted successfully!');
    }
    
    public function index()
    {
        // Fetch all previous requests
        $previousRequests = Requests::all();

        // Pass previous requests to the view
        return view('rq', ['previousRequests' => $previousRequests]);
    }
}
