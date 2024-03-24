@extends('Layout.Sidebar')
@section('title','Durba | Announcements')
@section('body')
<div class="flex justify-end rounded-md ">
<a href="{{route('indexannouncement')}}" class="inline-flex items-center text-lg text-blue-900 hover:underline">
<svg class="w-96 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
</svg>
</a>
</div>
<div class="flex justify-center">
  <div class="max-w-sm pb-60 bg-white border border-gray-200 rounded-lg shadow">
    <div class="p-6">
      <h1 class="text-2xl font-serif mb-5 text-blue-900">{{$announcement->title}}</h1>
      <div class="font-normal">
        <div class="text-blue-900 font-semibold">{{$announcement->content}}</div>

        @if($announcement->attachment)
        <div class="flex justify-left w-96 text-blue-900 font-semibold">Attachment :
        <a href="{{route('download',$announcement->attachment)}}" class=" font-medium text-blue-800 hover:underline "> Download File</a>
        <svg class="w-5 h-5 text-blue-800 hover:underline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
    </svg>
        </a>
    </div><br><hr><br>
        @endif
@endsection