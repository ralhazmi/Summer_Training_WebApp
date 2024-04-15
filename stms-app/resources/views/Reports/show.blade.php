@extends('Layout.Sidebar')
@section('title','Durba | Reports')
@section('body')

<head>
<script src="https://kit.fontawesome.com/bfb4213bb3.js" crossorigin="anonymous"></script>
</head>

<div class="flex justify-end rounded-md ">
<a href="{{route('Reportsindex')}}" class="inline-flex items-center text-lg text-blue-900 hover:underline">
<svg class="w-96 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
</svg>
</a>
</div>
<div class="flex justify-center">
  <div class="max-w-sm pb-60 bg-white border border-gray-200 rounded-lg shadow">
    <div class="p-6">
    <div class="text-gray-400 font-semibold flex justify-end mb-5 "style="margin-bottom: -25px;">{{$report->date}}</div>
      <h1 class="text-2xl font-serif mb-5"style="color:#00519B;">Report Title: {{$report->report_title}}</h1>
      <div class="font-normal">
        <div class="font-semibold"style="color:#00519B;">Student ID: {{$report->user_id}}</div>


        @if($report->attachment)
        <br/>
        <div class="flex justify-left w-96 text-blue-800 font-semibold items-center">
    <button onclick="window.location='{{ route('download', $report->attachment) }}'" class="bg-blue-900 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded flex items-center">
        Download File
        <svg class="w-5 h-5 ml-1 text-white hover:underline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
        </svg>
    </button>
</div>


    </div><br><hr><br>
        @endif


@endsection









