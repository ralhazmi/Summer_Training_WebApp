@extends('Layout.Sidebar')

@section('title', 'Durba | Requests')

@section('body')
<style>
/* Add these styles to your existing CSS file or create a new one */
.pagination a,
.pagination span {

    color: #00519b;
    border-color: #00519b;
    background-color: #fff;

}
input[type=file]::file-selector-button {

background-color: #00519B ;

}
input[type=file]::file-selector-button:hover {
background-color: #00519B;
}

</style>

<!--pop up code -->

<div class="flex justify-end rounded-md ">
<div class="w-full justify-between block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
<button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="w-52 justify-between text-blue-900 bg-white border-b-2 border-blue-900 hover:bg-gray-200 focus:ring-1 focus:outline-none focus:ring-blue-900 font-medium rounded-sm text-md px-5 py-2.5 text-center inline-flex items-center " type="button">Filter By Status<svg class="w-2.5 h-2.5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52">
    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
        <li>
            <a href="{{ route('indexrequest') }}" class="block px-4 py-2 hover:bg-gray-100">
                <p class="h-2.5 w-2.5 rounded-full bg-gray-500 inline-block me-2"></p>
                <span>All Requests</span>
            </a>
        </li>
        <li>
            <a href="{{ route('requestsFilter', ['status' => 1]) }}" class="block px-4 py-2 hover:bg-gray-100">
                <p class="h-2.5 w-2.5 rounded-full bg-green-500 inline-block me-2"></p>
                New Requests
            </a>
        </li>
        <li>
            <a href="{{ route('requestsFilter', ['status' => 2]) }}" class="block px-4 py-2 hover:bg-gray-100">
                <p class="h-2.5 w-2.5 rounded-full bg-orange-500 inline-block me-2"></p>
                Pending Requests
            </a>
        </li>
        <li>
            <a href="{{ route('requestsFilter', ['status' => 3]) }}" class="block px-4 py-2 hover:bg-gray-100">
                <p class="h-2.5 w-2.5 rounded-full bg-red-500 inline-block me-2"></p>
                Closed Requests
            </a>
        </li>
    </ul>
</div>

    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse ">
        @if(auth()->user()->role == 1)
        <button data-modal-target="small-modal" data-modal-toggle="small-modal" class=" transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 block w-52 md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Add Request</button>
        @endif
    </div>
</div></div>

<!-- Bottom Right Modal -->
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium"style="color:#00519B;">+Add Request</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="small-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form method="post" action="{{ route('storerequest') }}" enctype="multipart/form-data" style="width:80%; margin:0 auto;">
                    @csrf <!-- CSRF token (not needed since it's not a Laravel application) -->
                    <div>
                        <!-- <label for="userTo" class="mb-5 text-sm text-gray-900 ">To</label>
                        <input type="userTo" id="userTo" name="userTo" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter your email" required /> -->
                        <label for="userTo" class="block mb-2 text-sm font-medium "style="color:#00519B;">Send To: </label>
                        <select id="userTo" name="userTo" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "style="color:#00519B;">
                            <option value="">Select Supervisor...</option>
                            @foreach($users as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex mb-5">
                        <div class="w-1/2 mr-2">
                            <label for="request_title" class="block mb-2 text-sm font-medium "style="color:#00519B;">Title</label>
                            <input type="text" id="request_title" name="request_title" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Write title here..." required />
                            @error('request_title')
                            <span class="text-red-800">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2 ml-2">
                            <label for="date" class="block mb-2 text-sm font-medium   "style="color:#00519B;">Date</label>
                            <input type="date" id="date" name="date" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                            @error('date')
                            <span class="text-red-800">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="content" class="block mb-2 text-sm font-medium "style="color:#00519B;">Content</label>
                        <textarea id="content" rows="3" class="p-2.5 w-full text-sm text-gray-900 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write content here..." name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <span class="text-red-800">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <label class="text-sm font-medium " style="color:#00519B;"for="user_avatar">Attachments</label>
                    <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="user_avatar" type="file" name="attachment">
                    <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 ">
    <h2 class="text-lg font-semibold mb-4 text-blue-900">Previous Requests</h2>
    <div class="flex flex-wrap grid-cols-3 gap-4">
            @if (count($previousRequests) > 0)
            @foreach($previousRequests as $request)

        <div class=" bg-white w-60 shadow-md shadow-cyan-500/50   hover:shadow-xl hover:shadow-cyan-500/50 rounded-lg p-4 mb-4">
            <!-- <div class=" inline-block justify-center rounded-md"> -->
            <div class="font-semibold text-gray-400 flex justify-end" style="margin-bottom: -25px;">{{$request->date}}</div>
                    <h4 class="  font-semibold mb-4 "style="color:#00519B;">{{$request->request_title}}</h4><br>
                <div class="flex justify-center rounded-md ">
                    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                        @if(auth()->user()->role == 2)
                        <button data-modal-target="small-modal-{{ $request->id }}" data-modal-toggle="small-modal-{{ $request->id }}" class=" w-60 shadow-md shadow-cyan-500/50   hover:shadow-xl hover:shadow-cyan-500/50 block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Manage Request</button>
                        @endif
                    </div>
                </div>
                <br/>
                <!-- Bottom Right Modal -->
                <div id="small-modal-{{ $request->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow ">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-xl font-medium "style="color:#00519B;">Manage  Request</h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="small-modal-{{ $request->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <form method="post" action="{{ route('requestReply',$request->id) }}" enctype="multipart/form-data" style="width:80%; margin:0 auto;">
                                    @csrf <!-- CSRF token (not needed since it's not a Laravel application) -->
                                    <div>
                                        <label for="request_status" class="block mb-2 text-sm font-medium"style="color:#00519B;">Status:</label>
                                        <div class="select-wrapper">
                                            <select id="request_status" name="request_status" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                <option value="" selected>Select Status...</option>
                                                <option value="1">New</option>
                                                <option value="2" >Pending</option>
                                                <option value="3" >Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="request_title" class="text-sm"style="color:#00519B;">Title</label>
                                        <input type="text" id="request_title" name="request_title" value="{{$request->request_title}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " disabled/>
                                    </div>
                                    <div>
                                        <!-- <input type="hidden" id="request_id" name="request_id" value="{{$request->id}}" /> -->
                                    </div>
                                    <div>
                                        <label for="content" class="text-sm  text-black"style="color:#00519B;">Content</label>
                                        <textarea id="content" rows="3" class="p-2.5 w-full text-sm text-gray-900 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write content here..." name="content">{{ old('content') }}</textarea>
                                        @error('content')
                                        <span class="text-red-800">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium " style="color:#00519B;" for="attachment">Attachment</label>
                                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"  id="attachment" type="file" name="attachment" >

                                    </div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @if(auth()->user()->role == 1)
            <div class="text-blue-900 font-semibold">To: {{ $userToNames[$request->id] }}</div>
            @elseif(auth()->user()->role == 2)
                <div class="text-blue-900 font-semibold">From: {{ $request->user->username }}</div>
            @endif
                <div class="text-blue-900 font-semibold">Status:
                @if($request->request_status  == 1)
                <p class="h-2.5 w-2.5 rounded-full bg-green-500 inline-block me-2"></p>New
                @elseif($request->request_status  == 2)
                <p class="h-2.5 w-2.5 rounded-full bg-yellow-500 inline-block me-2"></p>Pending
                @else
                <p class="h-2.5 w-2.5 rounded-full bg-red-500 inline-block me-2"></p>Closed
                @endif


</div>
<!-- Add more fields as needed -->

<a href="{{route('requestdetails',$request->id)}}" class="font-medium text-blue-800 hover:underline"><button class="mt-1 border border-blue-900 relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group hover:bg-blue-900   hover:text-white  focus:ring-4 focus:outline-none focus:ring-cyan-600">
<span class="relative px-5 py-2.5  transition-all ease-in duration-75 bg-white  rounded-md group-hover:bg-opacity-0">
<i class="fa-solid fa-circle-info " style="color: #00519b;"></i><i class="ml-2">View Details</i>
</span>
</button></a>

</div>
@endforeach
@else
  <p>No requests</p>
@endif
</div>
</div>
<span class="pagination">
    {{$previousRequests->links()}}
</span>


@endsection
