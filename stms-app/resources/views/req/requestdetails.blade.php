@extends('Layout.Sidebar')
@section('title','Durba | Requests')
@section('body')


<div class="flex justify-end rounded-md ">
<a href="{{route('indexrequest')}}" class="inline-flex items-center text-lg text-blue-900 hover:underline">
<svg class="w-96 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
</svg>
</a>
</div>
<div class="flex justify-center">
  <div class="max-w-sm pb-60 bg-white border border-gray-200 rounded-lg shadow">
    <div class="p-6">
    <div class="font-semibold text-gray-400 flex justify-end" style="margin-bottom: -25px;">{{$request->date}}</div>
      <h1 class="text-2xl font-serif mb-5 "style="color:#00519B;">{{$request->request_title}}</h1>
      <div class="font-normal">
      @if(auth()->user()->role == 1)
        <div class="font-semibold"style="color:#00519B;">To: {{ $userToName->username }}</div>
    @elseif(auth()->user()->role == 2)
        <div class="font-semibold"style="color:#00519B;">From: {{ $request->user->username }}</div>
    @endif
        <div class="font-semibold"style="color:#00519B;">Content :{{$request->content}}</div>
        <div class="font-semibold"style="color:#00519B;">Status:
                @if($request->request_status  == 1)
                <p class="h-2.5 w-2.5 rounded-full bg-green-500 inline-block me-2"></p>New
                @elseif($request->request_status  == 2)
                <p class="h-2.5 w-2.5 rounded-full bg-yellow-500 inline-block me-2"></p>Pending
                @else
                <p class="h-2.5 w-2.5 rounded-full bg-red-500 inline-block me-2"></p>Closed
                @endif
</div>


        @if($request->attachment)
        <div class="flex justify-left w-96  font-semibold items-center"style="color:#00519B;">
    <button onclick="window.location='{{route('download',$request->attachment)}}'" class="bg-blue-900 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded flex items-center">
        Download File
        <svg class="w-5 h-5 ml-1 text-white hover:underline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
        </svg>
    </button>
</div>
       <br><hr><br>
        @endif

        <h1 class="text-2xl font-serif mb-5"style="color:#00519B;">Reply:</h1>

        @if ($replies->isEmpty())
            <p class="text-blue-800">There is no reply</p>
        @else        @foreach ($replies as $reply)
    <div class="reply-container">
        <div class="font-semibold text-gray-400 flex justify-end" style="margin-top: -50px;">{{ $reply->created_at }}</div>
        <br/>
        <div class="reply-header">
            <div class="font-semibold" style="color:#00519B;">Reply Text : <p>{{ $reply->content }}</p></div>
            @if($reply->attachment)
                <div class="flex justify-left w-96 font-semibold" style="color:#00519B;">
                    <div class="flex justify-left w-96  font-semibold items-center" style="color:#00519B;">
                        <button onclick="window.location='{{route('download',$reply->attachment)}}'" class="bg-blue-900 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded flex items-center">
                            Download File
                            <svg class="w-5 h-5 ml-1 text-white hover:underline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endforeach
        @endif

    </div>
  </div>
</div>
@endsection
