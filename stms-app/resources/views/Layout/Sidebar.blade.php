<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/Durba-removebg-preview.png') }}" type="image/x-icon"/>
  <title>@yield('title','Durba')</title>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- Include Tailwind CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Flowbite -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
  .bg-teal-600 {
    --tw-bg-opacity: 1;
    background-color: #51c3cd !important;

  }
  #dropdownUsersButton {
    position: absolute;
    top: 30px;
    right: 70px;
}


  </style>
</head>
<body>
<nav class="fixed top-0 z-50 w-full bg-teal-600 border-b border-gray-200 ">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-blue-900 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="{{route('dashboard')}}" class="flex ms-2 md:me-24">
          <img src="{{ asset('images/Durba-removebg-preview.png') }}" class="h-14 mt-0 me-3" alt=" Logo" />
        </a>
      </div>
      <!--notifications-->
<!--end notifications-->
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full ">
                  <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>
              </button>
            </div>
            <div class="z-50 hidden my-4  list-none bg-teal-600 divide-y divide-gray-100 rounded shadow " id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-blue-950 " role="none">
                {{$user->username}}
                </p>
                <p class="text-xs font-medium text-gray-700 truncate " role="none">
                {{$user->email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="{{route('personal.profile')}}" class="block px-4 py-2 text-sm text-blue-900 hover:bg-gray-100 " role="menuitem">
                    <i class="fa-solid fa-user w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 "></i>Profile</a>
                </li>
              </ul>
            </div>
          </div>

@include('Layout.allnotifications')
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-teal-600 border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-teal-600 ">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{route('Dashindex')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class="fa fa-solid fa-house w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 " >
                </i>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{route('Reportsindex')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class=" fa fa-solid fa-file-lines flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75 group-hover:text-blue-900 " >
               </i>
               @if ($user->role == 2)
               <span class="flex-1 ms-3 whitespace-nowrap">Manage Reports</span>
               @else
               <span class="flex-1 ms-3 whitespace-nowrap">Reports</span>
               @endif
            </a>
         </li>
         <li>
            <a href="{{route('indexannouncement')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class="fa fa-solid fa-bullhorn flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 " >
                </i>
               <span class="flex-1 ms-3 whitespace-nowrap"> Announcements </span>
            </a>
         </li>
         <li>
            <a href="{{route('indexrequest')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class=" fa fa-solid fa-file-pen flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 ">
               </i>
               @if ($user->role == 2)
               <span class="flex-1 ms-3 whitespace-nowrap">Manage Requests</span>
               @else
               <span class="flex-1 ms-3 whitespace-nowrap"> Requests</span>
               @endif
            </a>
         </li>
         @if ($user->role == 2)
         <li>
         <a href="{{route('show.students')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class="fa fa-solid fa-people-roof flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 " >
               </i>
               <span class="flex-1 ms-3 whitespace-nowrap">Manage students</span>
            </a>
         </li>
         <li>
            <a href="{{route('getUsers')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class=" fa fa-solid fa-id-badge flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 ">
               </i>
               <span class="flex-1 ms-3 whitespace-nowrap">Contact with students</span>
            </a>
         </li>
         @endif
         @if ($user->role == 1)
         <li>
            <a href="{{route('getUsers')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class="fa fa-solid fa-id-card flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 " >
               </i>
               <span class="flex-1 ms-3 whitespace-nowrap">Contact with supervisor </span>
            </a>
         </li>
         @endif
         <li>
            <a href="{{route('logout')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group">
               <i class=" fa fa-solid fa-right-from-bracket flex-shrink-0 w-5 h-5 text-blue-900 transition duration-75  group-hover:text-blue-900 " >
               </i>
               <span class="flex-1 ms-3 whitespace-nowrap">Log out</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
  <div class="p-4  rounded-lg  mt-14">
    @yield('body')
      <!-- <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex items-center justify-center h-24 rounded bg-gray-50 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center h-24 rounded bg-gray-50 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center h-24 rounded bg-gray-50 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div> -->
      <!-- <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 ">
         <p class="text-2xl text-gray-400 ">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
         </p>
      </div>
      <div class="grid grid-cols-2 gap-4 mb-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 ">
            <p class="text-2xl text-gray-400">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50">
         <p class="text-2xl text-gray-400 ">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
         </p>
      </div>
      <div class="grid grid-cols-2 gap-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 ">
            <p class="text-2xl text-gray-400 ">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div> -->
   </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>




</html>



