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
      <h1 class="text-2xl font-serif mb-5 text-blue-800">{{$request->request_title}}</h1>
      <div class="font-normal">
        <p class="text-blue-800">Email : {{$request->email}}</p>
        <p class="text-blue-800">Content :{{$request->content}}</p>
        <p class="text-blue-800">Date :{{$request->date}}</p>
        <p class="text-blue-800">Request_status :{{$request->request_status}}</p>


        @if($request->attachment)
        <div class="flex justify-left w-96">
        <a href="{{route('download',$request->attachment)}}" class=" font-medium text-blue-800 hover:underline ">Attachment : Download File</a>
        <svg class="w-5 h-5 text-blue-800 hover:underline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
    </svg>
        </a>
    </div>
        @endif
        @if(auth()->user()->role == 2)
              <!-- Display form field for changing status -->
              <form method="post" action="{{ route('updatestatus', ['id' => $request->id]) }}">
                @csrf
                  <select name="request_status" id="request_status" class="block border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="open">Open</option>
                      <option value="pending">Pending</option>
                      <option value="closed">Closed</option>
                  </select>
                  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto mt-2 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Status</button>
              </form>
          @endif
    </div>
  </div>
</div>
@endsection