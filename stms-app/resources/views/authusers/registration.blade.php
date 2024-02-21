@extends('authusers.header')
@section('title','register')
@section('body')

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

<div class="h-screen mt-8 flex items-center justify-center w-full">
<div class=" w-full max-w-xl p-4 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 " style="background: linear-gradient(150deg, rgba(0,81,155,1) 0%, rgba(0,170,173,1) 50%);background-repeat: no-repeat;">
    <form action="{{route('auth.register.post')}}" method="POST" class="space-y-6" >
        @csrf
        <h5 class="text-xl font-medium " style="color:#F5F7FA;">Registration </h5>
        <div>
            <label for="id" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">University ID</label>
            <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="411......" required />
        </div>
        <div class="flex mb-4">
            <div class="w-1/2 mr-2 ">
            <label for="username" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">Full Name</label>
            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="Your Full Name" required />
            </div>
            <div class="w-1/2 ">
                <label for="major" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">Department</label>
                <input type="text" name="major" id="major" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="ex:Information technology..." required />
            </div>
        </div>
        <!-- <div>
            <label for="email" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">Your University email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="name@company.com" required />
        </div> -->
        <div class="flex mb-4">
            <div class="w-1/2 mr-2 ">
            <label for="email" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">Your University email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="name@company.com" required />
            </div>
            <div class="w-1/2 ">
                <label for="hours" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">Hours earned</label>
                <input type="number"  name="hours" id="hours" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="must be 120 or above" required />
            </div>
        </div>
        <div class="flex mb-4">
            <div class="w-1/2 mr-2 ">
            <label for="password" class="block mb-2 text-sm font-medium " style="color:#F5F7FA;">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            <p style="color:#F5F7FA;font-size:smaller">*password must have at least 8 numbers</p>
            </div>
            <div class="w-1/2 ">
            <label for="confirmpass" class="block mb-2 text-sm font-medium " style="color:#F5F7FA;">Password Confirmation</label>
            <input type="password" name="confirmpass" id="confirmpass" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
        </div>
        <!-- <div>
            <label for="password" class="block mb-2 text-sm font-medium " style="color:#F5F7FA;">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" style="color:#F5F7FA;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div> -->
        <button type="submit" class="w-full text-white bg-sky-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-sky-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">register </button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Already have an account? <a href="/" class="text-sky-700 hover:underline">Go To Login</a>
        </div>
    </form>
</div>
</div>
@endsection
