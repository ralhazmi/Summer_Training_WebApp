@extends('Layout.Sidebar')
@section('title','Durba | Chat')
@section('body')
<!-- component -->

<div class="flex-1 p:2 sm:p-6 justify-between flex flex-col " style="height: 86vh;">
   <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
      <div class="relative flex items-center space-x-4">
        <div class="flex justify-start rounded-md ">
            <a href="{{route('getUsers')}}" class="inline-flex items-center text-lg text-blue-900 ">
            <i class="fa-solid fa-chevron-left fa-lg"></i>
            </a>
        </div>
         <div class="relative">
            <i class="fa-regular fa-user fa-xl overflow-hidden w-8 h-8  mr-2 flex justify-center items-center" style="color: #00519b;"></i>
        </div>
         <div class="flex flex-col leading-tight">
            <div class="text-xl mt-1 flex items-center">
               <span class="text-gray-700 mr-3">{{$receiver->username}} </span>
            </div>
            <span class="text-md text-gray-600">{{$receiver->major}}</span>
         </div>
      </div>
   </div>
   <div id="chat_area" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
        @foreach($messages as $message)
        @if($message->sender == $user->id)
        <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-s max-w-xs mx-2 order-1 items-end">
                    <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">{{ $message->message }}</span></div>
                    </div>
                    <i class="fa-regular fa-user fa-xl overflow-hidden w-8 h-8 mr-2 flex justify-center items-center w-6 h-6 rounded-full order-1" style="color: #00519b;"></i>
                </div>
            </div>

            @else
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-s max-w-xs mx-2 order-2 items-start">
                    <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-200 text-gray-600">{{ $message->message }}</span></div>
                    </div>
                    <i class="fa-regular fa-user fa-xl overflow-hidden w-8 h-8 mr-2 flex justify-center items-center" style="color: #00519b;"></i>         </div>
            </div>
            @endif
            @endforeach
   </div>
   <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
      <div class="relative flex">
         <input id="message" type="text" placeholder="Write your message!" class="w-3/4 focus:outline-none focus:placeholder-gray-400 md:w-full text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3">
         <div class="absolute right-0 items-center inset-y-0 sm:flex">
            <button id="send" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
               <span class="font-bold">Send</span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                  <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
               </svg>
            </button>
         </div>
      </div>
   </div>
</div>

<style>
.scrollbar-w-2::-webkit-scrollbar {
  width: 0.25rem;
  height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
  --bg-opacity: 1;
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
  --bg-opacity: 1;
  background-color: #edf2f7;
  background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
  border-radius: 0.25rem;
}
</style>

<script>
	const el = document.getElementById('messages')
	el.scrollTop = el.scrollHeight
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to mark conversation as read
    $("#send").click(function() {
        $.post("/chat/{{$receiver->id}}", {
            message: $("#message").val()
        },
        function(data, status) {
            console.log("Data: " + data + "\nStatus: " + status);

            // Construct the HTML for the sender's message
            let senderMessage =
                '<div class="flex items-center justify-end"><div class="bg-blue-500 text-white rounded-lg p-2 mt-2 shadow mr-2 max-w-sm">' +
                $("#message").val() +
                '</div>' +
                '<i class="fa-regular fa-user fa-xl overflow-hidden w-8 h-8 mr-2 flex justify-center items-center" style="color: #00519b;"></i></div>';

            // Append the sender's message to the chat_area
            $("#chat_area").append(senderMessage);
            $.post(`/chat/{{$receiver->id}}/mark-as-read`, function(response) {
            // Optional: Handle response if needed
            console.log('Conversation marked as read');});

            // Clear the message input after sending
            $("#message").val('');

            // Scroll to the bottom of chat_area
            var chatArea = document.getElementById("chat_area");
            chatArea.scrollTop = chatArea.scrollHeight;
        });
    });
    Pusher.logToConsole = true;

    var pusher = new Pusher('89262f7eab4890f4c68d', {
    cluster: 'eu'
    });

    var channel = pusher.subscribe('chat{{$user->id}}');
    channel.bind('chatMessage', function(data) {
    // Construct the HTML for the sender's message
    let receiverMessage ='<div class="flex mt-2 items-center justify-start"><i class="fa-regular fa-user fa-xl overflow-hidden w-8 h-8 mr-2 flex justify-center items-center" style="color: #00519b;"></i><div class="bg-gray-200 rounded-lg p-2 shadow mb-2 max-w-sm">'+
            data.message+
            '</div></div>'

            // Append the sender's message to the chat_area
            $("#chat_area").append(receiverMessage);
            // AJAX request to mark conversation as read

            // Scroll to the bottom of chat_area
            var chatArea = document.getElementById("chat_area");
            chatArea.scrollTop = chatArea.scrollHeight;
    });

    // Initial scroll to bottom when page loads
    $(document).ready(function() {
        // Scroll to the bottom of chat_area
        var chatArea = document.getElementById("chat_area");
            chatArea.scrollTop = chatArea.scrollHeight;
    });
</script>
@endsection
