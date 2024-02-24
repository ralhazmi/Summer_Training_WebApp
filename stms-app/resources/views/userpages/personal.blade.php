@extends('authusers.header')
@section('title','Durba | personal')
@section('body')



    <!-- <div class="h-full mt-0 flex items-center justify-center w-full">
        <div class="w-full max-w-xl p-4 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 profile-info">
            <h1>User Profile</h1>
            <p>Username: {{$user->username}}</p>
            <p>User ID: {{$user->id}}</p>
            <p>Email: {{$user->email}}</p>
            <p>Major: {{$user->major}}</p>
        </div>
    </div> -->
<div class="h-full mt-0 flex items-center justify-center w-full">
<div class=" w-fit bg-white overflow-hidden shadow rounded-lg border">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-lg font-bold text-blue-900">
            User Information
        </h3>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium font-bold text-gray-500">
                    Full name
                </dt>
                <dd class="mt-1 text-sm text-blue-900 sm:mt-0 sm:col-span-2">
                {{$user->username}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium font-bold text-gray-500">
                    Email address
                </dt>
                <dd class="mt-1 text-sm text-blue-900 sm:mt-0 sm:col-span-2">
                {{$user->email}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium font-bold text-gray-500">
                User ID
                </dt>
                <dd class="mt-1 text-sm text-blue-900 sm:mt-0 sm:col-span-2">
                {{$user->id}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium font-bold text-gray-500">
                    Depaertment
                </dt>
                <dd class="mt-1 text-sm text-blue-900 sm:mt-0 sm:col-span-2">
                {{$user->major}}
                </dd>
            </div>
            @if ($user->role == 1)
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium font-bold text-gray-500">
                    Hours
                </dt>
                <dd class="mt-1 text-sm text-blue-900 sm:mt-0 sm:col-span-2">
                {{$user->hours}}
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium font-bold text-gray-500">
                    Training Entity
                </dt>
                <dd class="mt-1 text-sm text-blue-900 sm:mt-0 sm:col-span-2">
                Unkown
                </dd>
            </div>
            @endif
        </dl>
    </div>
</div></div>

@endsection
