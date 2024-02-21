@extends('authusers.header')
@section('title','Login')
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

<div class="h-screen flex items-center justify-center w-full">
<div class=" w-96 max-w-xl p-4 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 " style="background: linear-gradient(150deg, rgba(0,81,155,1) 0%, rgba(0,170,173,1) 50%);background-repeat: no-repeat;">
    <form  action="{{route('auth.login.post')}}" method="POST" class="space-y-6" >
        @csrf
        <h5 class="text-xl font-medium " style="color:#F5F7FA;">Sign in </h5>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium "style="color:#F5F7FA;">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="Id@qu.edu.sa" required />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium " style="color:#F5F7FA;">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div>
        <button type="submit" class="w-full text-white bg-sky-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login </button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Not registered? <a href="/register" class="text-sky-700 hover:underline">Create account</a>
        </div>
    </form>
</div>
</div>
@endsection
