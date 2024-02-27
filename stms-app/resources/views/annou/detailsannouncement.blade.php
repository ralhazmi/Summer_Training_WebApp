@extends('Layout.Sidebar')
@section('title','Durba | Announcements')
@section('body')
<div class="flex justify-center ">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500  w-full md:w-auto">
        <tbody>
            <tr class="bg-white border-b ">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z"/>
</svg>
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$announcement->title}}</div>
                        <div class="font-normal text-gray-500">{{$announcement->content}}</div>
                        <div class="font-normal text-gray-500">{{$announcement->attachment}}</div>
                    </div>  
                  </th>
                  <td class="px-6 py-4">
                  {{$announcement->created_at}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@endsection