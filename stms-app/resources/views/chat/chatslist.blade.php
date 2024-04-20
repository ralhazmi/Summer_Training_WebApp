@extends('Layout.Sidebar')
@section('title','Durba | Chats')
@section('body')

<style>
    .shadow-cyan-800 {
    --tw-shadow-color: #51c3cd !important;
}
/* Add these styles to your existing CSS file or create a new one */
.pagination a,
.pagination span {

    color: #00519b;
    border-color: #00519b;
    background-color: #fff;

}

</style>

<div class="py-10 h-screen  px-2">
    <div class="max-w-lg mx-auto  overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full p-4">
                <div class="relative">
                     <!-- <input type="text" class="w-full h-12 rounded focus:outline-none px-3 focus:shadow-md" placeholder="Search..."> <i class="fa fa-search absolute right-3 top-4 text-gray-300"></i>  -->
                    </div>
                <ul>

    @if($user->role == 2 )
    @foreach( $studentsWithLastMessage as $userData)
        <!-- Only show users with role 1 when logged in user has role 2 -->
        <a href="{{ route('chatForm', $userData['user']->id) }}" class="conversation-link">
            <li id="users" class="flex justify-between items-center shadow-md shadow-cyan-800 bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition">
                <div class="flex ml-2">
                    <i class="fa-regular fa-user fa-2xl overflow-hidden flex justify-center items-center" style="color: #00519b;"></i>
                    <div class="flex flex-col ml-2">
                        <span class="font-medium text-black">{{ $userData['user']->username }}
                        @if ($userData['unreadCount'] > 0)
                        <span class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                        {{ $userData['unreadCount'] }}</span>
                      @endif
                        </span>
                        @if ($userData['lastMessage'])
                        <span class="text-sm text-gray-400 truncate w-32"> {{ $userData['lastMessage'] }}</span>
                        @else
                        <span class="text-sm text-gray-400 truncate w-32"> No message yet</span>
                        @endif
                    </div>

                </div>
                @if ($userData['lastMessage'])
                <div class="flex flex-col items-center">
                    <span class="text-gray-300">{{ $userData['date'] }}</span>
                </div>
                @endif
            </li>
        </a>
        @endforeach
    @elseif($user->role == 1 )
    @foreach($supervisorsWithLastMessage as $userData)
        <!-- Only show users with role 2 when logged in user has role 1 -->
        <a href="{{ route('chatForm', $userData['user']->id) }}" class="conversation-link">
            <li id="users" class="flex justify-between items-center shadow-md shadow-cyan-800 bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition">
                <div class="flex ml-2">
                    <i class="fa-regular fa-user fa-2xl overflow-hidden flex justify-center items-center" style="color: #00519b;"></i>
                    <div class="flex flex-col ml-2">
                        <span class="font-medium text-black">{{ $userData['user']->username }}
                        @if ($userData['unreadCount'] > 0)
                            <span class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                            {{ $userData['unreadCount'] }}</span>
                        @endif
                        </span>
                        @if ($userData['lastMessage'])
                        <span class="text-sm text-gray-400 truncate w-32">{{ $userData['lastMessage'] }}</span>
                        @else
                        <span class="text-sm text-gray-400 truncate w-32">No messages yet</span>
                    @endif
                    </div>
                </div>
                @if ($userData['lastMessage'])
                <div class="flex flex-col items-center">
                    <span class="text-gray-300">{{ $userData['date'] }}</span>
                </div>
                @endif
            </li>
        </a>
        @endforeach
    @endif
                </ul>
            </div>

        </div>
    </div>
    <span class="pagination" >
    {{$users->links()}}
</span>
</div>



@endsection

<script>// Attach click event handlers to conversation links
function checkUnreadMessages() {
$('.conversation-link').on('click', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    // AJAX request to mark conversation as read
    $.post(link + '/mark-as-read', function(response) {
        // Hide the message indicator on success
        $('.message-indicator', $(this)).remove();
        window.location.href = link; // Redirect to conversation page
    });
});}
$(document).ready(function() {
        checkUnreadMessages(); // Initial check

        // Periodically check for unread messages
        setInterval(checkUnreadMessages, 30000); // 30 seconds interval
    });
</script>
