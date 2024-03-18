@extends('Layout.Sidebar')
@section('title','Durba | Reports')
@section('body')

<head>
<script src="https://kit.fontawesome.com/bfb4213bb3.js" crossorigin="anonymous"></script>
</head>

        <!--  the border style  -->

      <div class="flex justify-center items-center h-screen">
      <div class="max-w-100 p-40 bg-white border-8 border-white-400 rounded-lg shadow dark:bg-white-800 dark:border-white-700 relative">
      <svg class="w-7 h-7 text-blue-500 dark:blue-white-400 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      </svg>

        <!-- Icon inside the border on the left side -->

         <div class="absolute left-0 mt-4 ml-4">
         <i class="fa-solid fa-file-import fa-7x text-blue-500 dark:blue-white-400" style="color: #20488d;"></i>
         </div>

        <!-- Your content here -->

          <a href="{{route('Reportsindex')}}" class="inline-flex items-center text-lg text-blue-900 hover:underline">
          </a>
        <p class="mb-3 font-semibold text-blue-700 dark:text-white-400">Student ID: {{$report->user_id}}</p>
        <p class="mb-3 font-semibold text-blue-700 dark:text-white-400">Report Title: {{$report->report_title}}</p>
        <p class="mb-3 font-semibold text-blue-700 dark:text-white-400">Report Date: {{$report->date}}</p>
        <p class="mb-3 font-semibold text-blue-700 dark:text-white-400">Student Degree: {{$report->degree}}</p>

      
        <!-- Download button at bottom left -->

          @if($report->attachment)
          <div class="absolute bottom-0 left-0 mb-4 ml-6">
          <a href="{{route('download',$report->attachment)}}" class="block text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
          Download File
          </a>
          </div>
          @endif
      
        <!-- Add Degree button at top right -->
        
<div class="absolute top-0 right-0 mt-6 mr-6">
    @if(auth()->user()->role == 2)
    <form method="POST" action="{{ route('reports.give-degree', $report->id) }}"> 
        @csrf <!-- CSRF token -->

        <!-- Modal trigger button -->
        <button type="button" data-modal-target="small-modal" data-modal-toggle="small-modal" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
            + Add Degree
        </button>

        <!-- Hidden modal content -->
        <div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-medium text-gray-900"> Add degree</h3>
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
                                    <label for="degree" class="block text-sm font-medium text-gray-600">Degree</label>
                                    <input type="integer" id="degree" name="degree" class="form-input mt-1 block w-full" required>
                                </div>
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Give Degree</button>
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

@endsection









