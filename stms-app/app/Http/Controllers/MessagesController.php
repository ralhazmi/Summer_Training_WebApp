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

            // Determine which array to populate based on user type
            if ($userType === 'student') {
                $studentsWithLastMessage[] = [
                    'user' => $user,
                    'lastMessage' => $lastMessage ? $lastMessage->message : null,
                    'date' => $formattedDate,
                ];
            } elseif ($userType === 'supervisor') {
                $supervisorsWithLastMessage[] = [
                    'user' => $user,
                    'lastMessage' => $lastMessage ? $lastMessage->message : null,
                    'date' => $formattedDate,
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

    // public function getUsers(){
    //     // Get all users except the authenticated user
    //     $users = User::where('id', '!=', auth()->id())->get();

    //     // Separate users into supervisors (role 2) and students (role 1)
    //     $supervisors = $users->filter(function ($user) {
    //         return $user->role == 2;
    //     });

    //     $students = $users->filter(function ($user) {
    //         return $user->role == 1;
    //     });
    //     return view('chat.chatslist',compact('supervisors', 'students'),['user'=> auth()->user()]);
    // }
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

        return view('chat.chat',compact('receiver','messages'),['user'=> auth()->user()]);
    }

    public function sendMessage(Request $request, $user_id){
    $data['sender']=Auth::user()->id;
    $data['receiver']=$user_id;
    $data['message']=$request->message;
    Messages::create($data);
    // Broadcast message using Pusher
    $receiver= User::where('id',$user_id)->first();
    \broadcast(new ChatSent($receiver, $request->message));

    return response()->json(['message' => 'Message sent successfully'], 200);



}}


