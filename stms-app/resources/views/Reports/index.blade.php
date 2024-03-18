@extends('Layout.Sidebar')

@section('title', 'Durba | Reports')

@section('body')

    <!--pop up code -->

     <div class="flex justify-end rounded-md ">
     <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
        @if(auth()->user()->role == 1)
        <button data-modal-target="small-modal" data-modal-toggle="small-modal" class="block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 mt-3 text-center" type="button">+ Add Report</button>
        @endif
        </div>
        </div>


     <!-- Bottom Right Modal -->

      <div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">

        <!-- Modal content -->

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <!-- Modal header -->

        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-xl font-medium text-gray-900"> + Add Report</h3>
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

        @csrf <!-- CSRF token (not needed since it's not a Laravel application) -->
                    
        <div class="flex mb-5">
        <div class="w-1/2 mr-2">
        <label for="report_title" class="text-sm text-gray-900 text-white">Title</label>
        <input type="text" id="report_title" name="report_title" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your report title here..." required />
        @error('report_title')
        <span class="text-red-800">{{ $message }}</span>
        @enderror
        </div>

        <div class="w-1/2 ml-2">
        <label for="date" class="text-sm text-gray-900 text-white">Date</label>
        <input type="date" id="date" name="date" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        @error('date')
        <span class="text-red-800">{{ $message }}</span>
        @enderror
        </div>

        <div class="w-1/2 ml-2">
        <label for="user_id" class="text-sm text-gray-900 text-white">Student ID</label>
        <input type="integer" id="user_id" name="user_id" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        @error('user_id')
        <span class="text-red-800">{{ $message }}</span>
        @enderror
        </div>

        </div>
        <br>
        <label class="text-sm font-medium text-gray-900 text-white" for="user_avatar">Attachments</label>
        <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" name="attachment">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
        </form>
        </div>
        </div>
        </div>
        </div>


            <!-- card body -->

            <div class="relative">

        <div class="px-10 py-20  mt-3 bg-white border border-white-600 rounded-lg shadow dark:bg- Polynesian white-800 dark:border-white-700">
        <h2 class="text-lg font-semibold mb-4 text-blue-900">Student Reports</h2>
        <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">

        
        
		 @if (count($data) > 0)
         @foreach($data as $report)
         <div class="bg-white shadow rounded-lg p-4 mb-4"> 
         <div class="absolute right-8 mt-3 mr-7">
         <i class="fa-solid fa-file-lines fa-3x " style="color: #20488d;"></i>
         </div>

        <p class="text-blue-900 font-semibold">Report Title: {{ $report->report_title }}</p>
        <p class="text-blue-900 font-semibold">Date: {{ $report->date }}</p>
        <p class="text-blue-900 font-semibold">Student ID: {{ $report->user_id }}</p>
        <p class="text-blue-900 font-semibold">Degree: {{ $report->degree }}</p>

        <div class="flex justify-end items-center">
        <a href="{{route('Reportshow',$report->id)}}" class="block text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5">
        view details</a> 
		</div>
        </div>
		@endforeach
		@else
		<p> No Reports!</p>
		@endif
		</div>
		</div>
        @endsection
