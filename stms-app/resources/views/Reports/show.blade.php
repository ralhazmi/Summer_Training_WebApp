@extends('Layout.Sidebar')
@section('title','Durba | Reports')
@section('body')

<head>
<script src="https://kit.fontawesome.com/bfb4213bb3.js" crossorigin="anonymous"></script>
</head>

<div class="flex justify-end rounded-md ">
<a href="{{route('Reportsindex')}}" class="inline-flex items-center text-lg text-blue-900 hover:underline">
<svg class="w-96 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
</svg>
</a>
</div>
<div class="flex justify-center">
  <div class="max-w-sm pb-60 bg-white border border-gray-200 rounded-lg shadow">
    <div class="p-6">
      <h1 class="text-2xl font-serif mb-5 text-blue-900">Report Title: {{$report->report_title}}</h1>
      <div class="font-normal">
        <div class="text-blue-800 font-semibold">Student ID: {{$report->user_id}}</div>
        <div class="text-blue-800 font-semibold">Report Date: {{$report->date}}</div>
        <div class="text-blue-800 font-semibold">Student Degree: {{$report->degree}}</div>

        @if($report->attachment)
        <div class="flex justify-left w-96 text-blue-800 font-semibold">Attachment :
        <a href="{{route('download',$report->attachment)}}" class=" font-medium text-blue-800 hover:underline "> Download File</a>
        <svg class="w-5 h-5 text-blue-800 hover:underline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
    </svg>
        </a>
    </div><br><hr><br>
        @endif
        
        <!-- Add Degree button at top right -->
        
    @if(auth()->user()->role == 2)
    <form method="POST" action="{{ route('reports.give-degree', $report->id) }}"> 
        @csrf <!-- CSRF token -->
        <!-- Modal trigger button -->
        <button type="button" data-modal-target="small-modal" data-modal-toggle="small-modal" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
             Add Degree
        </button>

        <!-- Hidden modal content -->
        <div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-medium text-blue-900"> + Add degree</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="small-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="flex mb-5">
                            <div class="w-1/2 mr-2">
                                <div class="mb-4">
                                    <label for="degree" class="block mb-2 text-sm font-medium text-blue-800">Degree</label>
                                    <input type="integer" id="degree" name="degree" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <button type="submit" class="bg-blue-900 text-white py-2 px-4 rounded hover:bg-blue-900">Give Degree</button>
                            </div>
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
    </div>
  </div>
</div>
    

@endsection









