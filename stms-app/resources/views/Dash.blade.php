@extends('Layout.Sidebar')
@section('title','Durba | Dashboard')
@section('body')
@if($errors->any())
    <div class=" m-2">
        <ul>
            @foreach($errors->all() as $error)
              <li>
              <div class="flex justify-end">
              <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div></div>
              </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('error'))
<div class="flex  justify-end">
<div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow "  role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{session('error')}}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div></div>
@endif

@if(session()->has('Success'))
<div class="flex  justify-end">
<div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{session('Success')}}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
</div>
@endif
<!--cords -->
<ol class="items-center sm:flex">
    <!--request-->
    <li class="relative mb-6 sm:mb-0">
        <div class="mt-3 sm:pe-8">
        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class=" float-right relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none" type="button">
<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
<path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
</svg>
</button>
            <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Requests </p>
            <p class="font-semibold text-gray-900 ">Published Requests({{$previousRequests}})</p>
           </a> 
    </div>
    <div id="dropdownAvatar" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow " aria-labelledby="dropdownUserAvatarButton">
  <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
      Notifications( .. )
      </div>
  <!--foreach(Auth::User()->unreadNotifications as $notification)-->
  <div class="divide-y divide-gray-100">
    <a href="3" class="flex px-4 py-3 hover:bg-gray-100 ">
      <div class="w-full ps-3">
          <div class="text-gray-500 text-sm mb-1.5">users_name<span class="font-semibold text-gray-900 ">title</span>: created_at</div>
      </div>
  </div>
  </a>
  <!--endforeach-->
</li>
<!--announcement-->
<li class="relative mb-6 sm:mb-0">
        <div class="mt-3 sm:pe-8 ">
            <a class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            @if ($user->role == 1)
            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class=" float-right relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none" type="button">
<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
<path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
</svg>
</button>
@endif
            <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Announcements</p>
            <p class="font-semibold text-gray-900 ">Published Announcement({{$data}})</p>
        </a> 
        <!-- Dropdown menu -->
<div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow " aria-labelledby="dropdownNotificationButton">
  <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
      Notifications({{Auth::User()->unreadNotifications->count()}})
  </div>
  @foreach(Auth::User()->unreadNotifications as $notification)
  <div class="divide-y divide-gray-100">
    <a href="3" class="flex px-4 py-3 hover:bg-gray-100 ">
      <div class="w-full ps-3">
          <div class="text-gray-500 text-sm mb-1.5">{{$notification->data['users_name']}}<span class="font-semibold text-gray-900 "> {{$notification->data['title']}}</span>: {{$notification->created_at}}</div>
      </div>
  </div>
  </a>
  @endforeach
    </div>
</li>
<!--report-->
<li class="relative mb-6 sm:mb-0">
        <div class="mt-3 sm:pe-8">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" class=" float-right relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none" type="button">
<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
<path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
</svg>
</button>
            <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Reports</p>
            <p class="font-semibold text-gray-900 ">Published Requests(..)</p>
        </a> 
        <!-- Dropdown menu -->
        <div id="dropdownDots" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow " aria-labelledby="dropdownMenuIconButton">
  <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
      Notifications( .. )
  </div>
  <!--foreach(Auth::User()->unreadNotifications as $notification)-->
  <div class="divide-y divide-gray-100">
    <a href="3" class="flex px-4 py-3 hover:bg-gray-100 ">
      <div class="w-full ps-3">
          <div class="text-gray-500 text-sm mb-1.5">users_name<span class="font-semibold text-gray-900 ">title</span>: created_at</div>
      </div>
  </div>
  </a>
  <!--endforeach-->
    </div>
</li>
</ol>
<br/>
<ol class=" sm:flex">
    <li class="relative mb-6 sm:mb-0">
        <br/>
        <div class="flex items-center">
            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 "></div>
        </div>
        <div class="mt-3 sm:pe-8">
           
        @include('dashcontent.CommonQuestions')
    </div>
    </li>
    <li class="relative mb-6 sm:mb-0">
    <br/>
        <div class="flex items-end">
            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 "></div>
        </div>
        <div class="mt-3 sm:pe-8">
        @include('dashcontent.TrainingInstitutions')
    </div>
    </li>
</ol>


@include('Layout.footer')
@endsection
