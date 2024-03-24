<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/Durba-removebg-preview.png') }}" type="image/x-icon"/>
  <title>@yield('title','Durba')</title>
  <!-- Include Tailwind CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Flowbite -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
        /* Add your CSS styles here */
        body {
            background: linear-gradient(150deg,rgba(0,81,155,1) 0%, rgba(81,195,205,1) 50%);
            font-family: Arial, sans-serif;
            color: #F5F7FA;
            background-repeat: no-repeat;
            height:100vh;

        }
        .bg-teal-600 {
            --tw-bg-opacity: 1;
            background-color: #51c3cd !important;
        }

  </style>
</head>
<body>
<nav class="fixed top-0 z-50 w-full bg-teal-600  ">
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
                <p class="text-xs font-medium text-gray-600 truncate " role="none">
                {{$user->email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="{{route('dashboard')}}" class="flex items-center p-2 text-blue-900 rounded-lg  hover:bg-gray-100  group" role="menuitem">
                  <i class="fa fa-solid fa-house fa-2xs w-2 h-2 text-blue-900 transition duration-75  group-hover:text-blue-900 " ></i> <span class="ms-6 text-sm">Dashboard</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>
<div class="p-4 ">
  <div class="p-4  rounded-lg  mt-16">
  <div class="flex justify-end rounded-md ">
<a href="{{route('dashboard')}}" class="inline-flex items-center text-lg text-blue-900 hover:underline">
<svg class="w-96 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
</svg>
</a>
</div>
    @yield('body')
   </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>
