<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/Durba-removebg-preview.png') }}" type="image/x-icon"/>
  <title>Durba | registeration</title>
  <!-- Include Tailwind CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
 <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style ="background: linear-gradient(300deg, rgba(0,81,155,1) 0%, rgba(81,195,205,1) 50%);background-repeat: no-repeat;height:135vh;">
@if($errors->any())
    <div class="bg-red-200 m-2">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('error'))
  <div class="bg-red-200 m-2">{{session('error')}}</div>
@endif

@if(session()->has('Success'))
  <div class="bg-green-200 m-2">{{session('Success')}}</div>
@endif

<div class="h-screen mt-24 flex items-center justify-center w-full">
<div class=" w-full max-w-xl p-4 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 " style="background-color:#F5F7FA;">
    <form action="{{route('auth.register.post')}}" method="POST" class="space-y-6 " >
        @csrf
        <a href="#" class="flex items-center justify-center" >
            <img src="{{ asset('images/Durba-removebg-preview.png') }}" class="mr-3 h-24 sm:h-24" alt="Logo" />
        </a>
        <h5 class="text-xl font-medium " style="color:#00519B;">Registration </h5>
        <div>
            <label for="id" class="block mb-2 text-sm font-medium "style="color:#00519B;">University ID</label>
            <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="411......" required />
        </div>
        <div class="flex mb-4">
            <div class="w-1/2 mr-2 ">
            <label for="username" class="block mb-2 text-sm font-medium "style="color:#00519B;">Full Name</label>
            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="Your Full Name" required />
            </div>
            <div class="w-1/2 ">
                <label for="major" class="block mb-2 text-sm font-medium "style="color:#00519B;">Department</label>
                <input type="text" name="major" id="major" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="ex:Information technology..." required />
            </div>
        </div>
        <!-- <div>
            <label for="email" class="block mb-2 text-sm font-medium "style="color:#00519B;">Your University email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="name@company.com" required />
        </div> -->
        <div class="flex mb-4">
            <div class="w-1/2 mr-2 ">
            <label for="email" class="block mb-2 text-sm font-medium "style="color:#00519B;">Your University email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="name@company.com" required />
            </div>
            <div class="w-1/2 ">
                <label for="hours" class="block mb-2 text-sm font-medium "style="color:#00519B;">Hours earned</label>
                <input type="number"  name="hours" id="hours" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="must be 120 or above" required />
            </div>
        </div>
        <div class="flex mb-4">
            <div class="w-1/2 mr-2 ">
            <label for="password" class="block mb-2 text-sm font-medium " style="color:#00519B;">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            <p style="color:#00519B;font-size:smaller">*password must have at least 8 numbers</p>
            </div>
            <div class="w-1/2 ">
            <label for="confirmpass" class="block mb-2 text-sm font-medium " style="color:#00519B;">Password Confirmation</label>
            <input type="password" name="confirmpass" id="confirmpass" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
        </div>
        <!-- <div>
            <label for="password" class="block mb-2 text-sm font-medium " style="color:#00519B;">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div> -->
        <button type="submit" class="w-full text-white bg-sky-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-sky-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">register </button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Already have an account? <a href="/" class="text-sky-700 hover:underline">Go To Login</a>
        </div>
    </form>
</div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>
