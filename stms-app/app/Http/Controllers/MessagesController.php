<?php

namespace App\Http\Controllers;

use App\Events\ChatSent;
use App\Models\User;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MessagesController extends Controller
{
    public function getUsers(Request $request)
    {
        $currentUserId = Auth::id();

        // Retrieve all users except the authenticated user
        $usersQuery = User::where('id', '!=', $currentUserId);

        // Initialize arrays for students and supervisors with last messages
        $studentsWithLastMessage = [];
        $supervisorsWithLastMessage = [];

        // Pagination configuration
        $perPage = 7; // Number of users per page (adjust as needed)
        $page = $request->query('page', 1); // Get current page from query string, default to 1

        // Apply pagination to the users query
        $paginatedUsers = $usersQuery->paginate($perPage);

        foreach ($paginatedUsers as $user) {
            // Determine if the user is a student or supervisor based on role
            if ($user->role == 1) {
                $userType = 'student';
            } elseif ($user->role == 2) {
                $userType = 'supervisor';
            } else {
                continue; // Skip users with unknown roles
            }

            // Retrieve the last message between the current user and this user
            $lastMessage = Messages::where(function ($query) use ($currentUserId, $user) {
                $query->where('sender', $currentUserId)
                    ->where('receiver', $user->id);
            })->orWhere(function ($query) use ($currentUserId, $user) {
                $query->where('sender', $user->id)
                    ->where('receiver', $currentUserId);
            })->latest('created_at')->first();

            // Format the created_at date
            $formattedDate = $lastMessage ? $lastMessage->created_at->format('d/m/Y H:i') : null;

            // Calculate unread message count for the current user
        $unreadCount = Messages::where('receiver', $currentUserId)
        ->where('sender', $user->id)
        ->where('is_read', false) // Assuming 'is_read' is a column in your messages table
        ->count();

        // Determine which array to populate based on user type
        if ($userType === 'student') {
            $studentsWithLastMessage[] = [
                'user' => $user,
                'lastMessage' => $lastMessage ? $lastMessage->message : null,
                'date' => $formattedDate,
                'unreadCount' => $unreadCount,
            ];
        } elseif ($userType === 'supervisor') {
            $supervisorsWithLastMessage[] = [
                'user' => $user,
                'lastMessage' => $lastMessage ? $lastMessage->message : null,
                'date' => $formattedDate,
                'unreadCount' => $unreadCount,
            ];
        }
    }


        return view('chat.chatslist', [
            'studentsWithLastMessage' => $studentsWithLastMessage,
            'supervisorsWithLastMessage' => $supervisorsWithLastMessage,
            'users' => $paginatedUsers,
            'user' => auth()->user(),
        ]);
    }

    public function chatForm($user_id){

    $receiver = User::find($user_id); // Retrieve the receiver user by ID

    if (!$receiver) {
        // Handle case where receiver user is not found
        abort(404);
    }

    $currentUserId = Auth::id();

    // Retrieve all messages sent by or received by the current user and the receiver
    $messages = Messages::where(function ($query) use ($currentUserId, $user_id) {
        $query->where('sender', $currentUserId)->where('receiver', $user_id);
    })->orWhere(function ($query) use ($currentUserId, $user_id) {
        $query->where('sender', $user_id)->where('receiver', $currentUserId);
    })->orderBy('created_at', 'asc')->get();

         // Find all unread messages for the current user from a specific sender
         $unreadMessages = Messages::where('receiver', $currentUserId)
         ->where('sender', $user_id)
         ->where('is_read', false) // Assuming there's a column 'is_read' to track message status
         ->get();

         // Loop through each message and mark it as read
         foreach ($unreadMessages as $message) {
         $message->is_read = true;
         $message->save(); // Save the updated message
         }

        return view('chat.chat',compact('receiver','messages'),['user'=> auth()->user()]);
    }

    public function sendMessage(Request $request, $user_id){
    $currentUserId = Auth::id();
    $data['sender']=Auth::user()->id;
    $data['receiver']=$user_id;
    $data['message']=$request->message;
    Messages::create($data);
     // Find all unread messages for the current user from a specific sender
     $unreadMessages = Messages::where('receiver', $currentUserId)
     ->where('sender', $user_id)
     ->where('is_read', false) // Assuming there's a column 'is_read' to track message status
     ->get();

     // Loop through each message and mark it as read
     foreach ($unreadMessages as $message) {
     $message->is_read = true;
     $message->save(); // Save the updated message
     }

    // Broadcast message using Pusher
    $receiver= User::where('id',$user_id)->first();
    \broadcast(new ChatSent($receiver, $request->message));

    return response()->json(['message' => 'Message sent successfully'], 200);



}
// MessagesController.php
public function markAsRead($user_id) {
    // Retrieve the authenticated user
    $currentUser = auth()->user();

    // Mark messages as read
    Messages::where('sender', $user_id)
        ->where('receiver', $currentUser->id)
        ->update(['is_read' => true]);

    return response()->json(['success' => true]);
}
public function unreadMessagesCount(Request $request)
    {
        // Retrieve the authenticated user
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Query to count unread messages for the authenticated user
        $unreadCount = Messages::where('receiver', $user->id)
            ->where('is_read', false)
            ->count();

        // Return the unread message count as JSON response
        return response()->json(['unread_count' => $unreadCount]);
    }
}


