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
<body style ="background: linear-gradient(300deg, rgba(0,81,155,1) 0%, rgba(81,195,205,1) 50%);background-repeat: no-repeat;height:100vh;">
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
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</html>

