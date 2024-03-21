<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function store(Request $request, $request_id)
    {
        $validatedData = $request->validate([
            'request_status'=>'required',
            'content' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        // Create or update reply
        $reply = Reply::where('request_id', $request_id)->first();
        if (!$reply) {
            $reply = new Reply();
            $reply->request_id = $request_id;
        }
        $reply->user_id = auth()->user()->id; // Assuming the authenticated user is a supervisor
        $reply->content = $validatedData['content'];
        $reply->save();

         // Handle attachment upload if provided
         if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentName = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('attachmentFile', $attachmentName);
            $reply->attachment = $attachmentName;
        }

        // Save the new request
        $reply->save();
        // Update request status based on reply
        $requestModel = Requests::find($request_id);
        if ($requestModel) {
            // Check the content of the reply or any other condition
            // Here, let's assume if there's a reply, the status is set to 'pending'
            $requestModel->request_status=$validatedData['request_status'];
            $requestModel->save();
        }

        return redirect()->back()->with('success', 'Reply submitted successfully');
    }
}
