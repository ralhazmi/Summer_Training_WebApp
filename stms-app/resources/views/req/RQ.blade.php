@extends('Layout.Sidebar')

@section('title', 'Durba | Announcements')

@section('body')
<!--pop up code -->
<div class="flex justify-end rounded-md ">
    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
        <button data-modal-target="small-modal" data-modal-toggle="small-modal" class="block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Add Request</button>
    </div>
</div>

<!-- Bottom Right Modal -->
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium text-gray-900">Add Request</h3>
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
                        <label for="email" class="mb-5 text-sm text-gray-900 text-white">To</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your email" required />
                        @error('email')
                        <span class="text-red-800">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex mb-5">
                        <div class="w-1/2 mr-2">
                            <label for="request_title" class="text-sm text-gray-900 text-white">Title</label>
                            <input type="text" id="request_title" name="request_title" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write title here..." required />
                            @error('request_title')
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
                    </div>
                    <div>
                        <label for="content" class="text-sm text-gray-900 text-black">Content</label>
                        <textarea id="content" rows="3" class="p-2.5 w-full text-sm text-gray-900 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write content here..." name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <span class="text-red-800">{{ $message }}</span>
                        @enderror
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

<div class="mt-8">
    <h2 class="text-lg font-semibold mb-4 text-blue-900">Previous Requests</h2>
    <div class="flex flex-wrap grid-cols-3 gap-4">
        @if (count($previousRequests) > 0)
        @foreach($previousRequests as $request)
        <div class="border border-gray-300 rounded-lg p-4 bg-gray-200">
            <p class="text-blue-900 font-semibold">Title: {{ $request->request_title }}</p>
            <p class="text-blue-900 font-semibold">Email: {{ $request->email }}</p>
            <p class="text-blue-900 font-semibold">Date: {{ $request->date }}</p>
            <p class="text-blue-900 font-semibold">Content: {{ $request->content }}</p>
            <!-- Add more fields as needed -->
        </div>
        @endforeach
        @else
        <p>No requests</p>
        @endif
    </div>
</div>

@endsection
