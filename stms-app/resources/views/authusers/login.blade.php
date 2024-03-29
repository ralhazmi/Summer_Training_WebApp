<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/Durba-removebg-preview.png') }}" type="image/x-icon"/>
  <title>Durba | Login</title>
  <!-- Include Tailwind CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
 <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style ="background: linear-gradient(300deg, rgba(0,81,155,1) 0%, rgba(81,195,205,1) 50%);background-repeat: no-repeat;height:120vh;">
@if($errors->any())
    <div class="m-2">
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

<div class="h-screen flex items-center justify-center w-full">
<div class=" w-96 max-w-xl p-4 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 " style="background-color:#F5F7FA;">
    <form  action="{{route('auth.login.post')}}" method="POST" class="space-y-6" >
        @csrf
        <a href="#" class="flex items-center justify-center" >
            <img src="{{ asset('images/Durba-removebg-preview.png') }}" class="mr-3 h-20 sm:h-24" alt="Logo" />
        </a>
        <h5 class="text-xl font-medium " style="color:#00519B;">Sign in </h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium "style="color:#00519B;">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="Id@qu.edu.sa" required />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium " style="color:#00519B;">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div>
        <button type="submit" class="w-full text-white bg-sky-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login </button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Not registered? <a href="/register" class="text-sky-700 hover:underline">Create account</a>
        </div>
    </form>
</div>
</div>
<div class="flex justify-center rounded-md">
<footer class="bg-transparent rounded-lg  m-4 fixed bottom-0 w-full">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">© 2024 جميع الحقوق محفوظة لجامعة القصيم</span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
                <li>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start rtl:justify-end">
                        <p class="flex items-center text-sm " style="color:#F5F7FA">الدعم الفني<button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="text-white-3v00" width="20" height="20" viewBox="0 0 22 22"   aria-hidden="true" fill="currentColor"  xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.079 6.839C13.7937 6.56502 13.457 6.35018 13.0883 6.20683C12.7196 6.06349 12.3262 5.99448 11.9307 6.00378C11.5352 6.01307 11.1455 6.10048 10.7839 6.26099C10.4224 6.42149 10.0962 6.65192 9.824 6.939M13 20H14.083C14.5974 20 15.1067 19.8987 15.582 19.7018C16.0572 19.505 16.489 19.2165 16.8527 18.8527C17.2165 18.489 17.505 18.0572 17.7018 17.582C17.8987 17.1067 18 16.5974 18 16.083V9C18 7.4087 17.3679 5.88258 16.2426 4.75736C15.1174 3.63214 13.5913 3 12 3C10.4087 3 8.88258 3.63214 7.75736 4.75736C6.63214 5.88258 6 7.4087 6 9V16M13 20V19C13 18.4477 12.5523 18 12 18H11C10.4477 18 10 18.4477 10 19V20C10 20.5523 10.4477 21 11 21H12C12.5523 21 13 20.5523 13 20ZM6 16V10H5C4.46957 10 3.96086 10.2107 3.58579 10.5858C3.21071 10.9609 3 11.4696 3 12V14C3 14.5304 3.21071 15.0391 3.58579 15.4142C3.96086 15.7893 4.46957 16 5 16H6ZM18 10H19C19.5304 10 20.0391 10.2107 20.4142 10.5858C20.7893 10.9609 21 11.4696 21 12V14C21 14.5304 20.7893 15.0391 20.4142 15.4142C20.0391 15.7893 19.5304 16 19 16H18V10Z" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" clip-rule="evenodd"/>
                            </svg><span class="sr-only">Show information</span></button></p>

                            <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72">

                            <div class="p-3 space-y-2">

                            <p> phone:0163016666 <br>

                            email:it-sup@qu.edu.sa </p>

                            <div data-popper-arrow></div>
                        </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</footer>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>

