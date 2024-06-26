@extends('Layout.Sidebar')

@section('title', 'Durba | Reports')

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
<div class="flex justify-end rounded-md ">
    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
        @if(auth()->user()->role == 1)
        <button data-modal-target="small-modal" data-modal-toggle="small-modal" class="transition ease-in-out delay-150 bg-blue-900 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 block w-52 md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Add Report</button>
        @endif
    </div>
</div>

<!-- Bottom Right Modal -->
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium text-blue-900">+Add Report</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="small-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
            <form method="post" action="{{ route('Reportstore') }}" enctype="multipart/form-data" style="width:80%; margin:0 auto;">

@csrf


    <div>
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
        <label for="report_title" class="block mb-2 text-sm font-medium "style="color:#00519B;">Title</label>
        <input type="text" id="report_title" name="report_title" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Write your report title here..." required />
        @error('report_title')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-1/2 ml-auto">
        <label for="date" class="block mb-2 text-sm font-medium text-blue-800 text-left">Date</label>
        <input type="date" id="date" name="date" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        @error('date')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

</div>



<div class="mb-5">
<div>
   <label class="block mb-2 text-sm font-medium " style="color:#00519B;" for="attachment">Attachment</label>
   <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"  id="attachment" type="file" name="attachment" accept=".pdf" required>
   <p class="mt-1 text-sm text-gray-400 " id="file_input_help">PDF Only</p>
</div>
</div>

<button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Send</button>
</form>





            </div>
        </div>
    </div>
</div>

<div class="mt-8 ">
    <h2 class="text-lg font-semibold mb-4 "style="color:#00519B;">Previous Reports</h2>
    <div class="flex flex-wrap grid-cols-3 gap-4">
            @if (count($data) > 0)
            @foreach($data as $report)
        <div class=" bg-white w-60 shadow-md shadow-cyan-500/50   hover:shadow-xl hover:shadow-cyan-500/50 rounded-lg p-4 mb-4">
            <!-- <div class=" inline-block justify-center rounded-md"> -->
            <div class="text-gray-400 font-semibold flex justify-end mb-5 "style="margin-bottom: -25px;">{{$report->date}}</div>
                    <h4 class="  font-semibold mb-4 "style="color:#00519B;">{{ $report->report_title }}</h4>

            @if(auth()->user()->role == 1)
            <div class="text-blue-900 font-semibold">To: {{ $userToNames[$report->id] }}</div>
            @elseif(auth()->user()->role == 2)
                <div class="text-blue-900 font-semibold">From: {{ $report->user->username }}</div>
            @endif
<!-- Add more fields as needed -->

<a href="{{route('Reportshow',$report->id)}}" class="mt-4 font-medium text-blue-800 hover:underline"><button class="mt-4 relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden border border-blue-900 text-sm font-medium text-gray-900 rounded-lg group hover:bg-blue-900   hover:text-white  focus:ring-4 focus:outline-none focus:ring-cyan-600">
<span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white  rounded-md group-hover:bg-opacity-0">
<i class="fa-solid fa-circle-info " style="color: #00519b;"></i><i class="ml-2">View Details</i>
</span>
</button></a>
</div>
@endforeach
@else
  <p>No report</p>
@endif
</div>
</div>
<span class="pagination">
    {{$data->links()}}
</span>


@endsection
