@extends('Layout.Sidebar')
@section('title','Durba | Announcements')
@section('body')
<style>
/* Add these styles to your existing CSS file or create a new one */
.pagination a,
.pagination span {

    color: #00519b;
    border-color: #00519b;
    background-color: #fff;

}

input[type=file]::file-selector-button {

background-color: #00519B ;

}
input[type=file]::file-selector-button:hover {
background-color: #00519B;
}

</style>
  <!--pop up code -->
<div class="flex justify-end rounded-md ">
<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
    <!-- Modal toggle -->
    @if ($user->role == 2)
    <button data-modal-target="small-modal" data-modal-toggle="small-modal" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Add Announcement
    </button>
    @endif
</div>
</div>
<!-- Small Modal -->
<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-medium text-blue-900">
                + Add Announcement
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="small-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500">
                <form  method="post" action="{{route('storeannouncement')}}" enctype="multipart/form-data" style="width:80%; margin:0 auto;">
                @csrf
                <div >
               <label for="title" class=" block mb-2 text-sm font-medium text-blue-800 ">Tittle</label>
             <input type="text" id="title" name="title"value="{{old('title')}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Write tittle here..." required />
              @error('title')
             <spam class="text-red-500"> {{ $message }} </spam>
             @enderror
            </div>
          <div>
           <label for="content" class=" block mb-2 text-sm font-medium text-blue-800 ">Content</label>
           <textarea id="content" rows="3" class=" p-2.5 w-full text-sm text-gray-900  rounded-lg   border-gray-300 focus:ring-blue-500 focus:border-blue-500  "placeholder="Write content here..."  name="content" value="{{old('content')}}"></textarea>
           @error('content')
          <spam class="text-red-500"> {{ $message }} </spam>
           @enderror
         </div>
         <label class="text-sm font-medium " style="color:#00519B;"for="user_avatar">Attachments</label>
        <input class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="user_avatar_help" id="user_avatar" type="file" name="attachment">
         <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Send</button>
    </form>
 </div>
 </p>
</div>
</div>
</div>
        <!-- </div>
    </div>
</div> -->
<!--end pop up code -->
<style>
        .advertisement {
        margin-bottom: 20px; /* إضافة مسافة بين كل إعلان */
        }
    /* تغيير لون الخلفية عند تحويل المؤشر للصف */
    tr:hover {
        background-color: #f1f1f1;
    }
    .shadow-cyan-800 {
    --tw-shadow-color: #51c3cd !important;
}
/* Add these styles to your existing CSS file or create a new one */
.pagination a,
.pagination span {

    color: #00519b;
    border-color: #00519b;
    background-color: #fff;

}
</style>

<div class="flex justify-center ">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left rtl:text-right text-blue-900  w-full md:w-auto drop-shadow-lg">
    @if (count($datann) > 0)
    @foreach($datann as $announcement)
        <tbody>
            <tr class="bg-white border-b border-x-indigo-500  shadow-inner shadow-2xl " style="padding-bottom: 20px">
                <th scope="row" class="flex items-center px-6 py-4 text-blue-900 whitespace-nowrap ">
                <svg class="w-6 h-6 text-blue-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 12 5.419 3.871A1 1 0 0 0 16 15.057V2.943a1 1 0 0 0-1.581-.814L9 6m0 6V6m0 6H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h7m-5 6h3v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5Zm15-3a3 3 0 0 1-3 3V6a3 3 0 0 1 3 3Z"/>
</svg>
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$announcement->title}}</div>
                        <div class="font-normal text-blue-900"><p>{!! Str::limit($announcement->content,40)!!}</p></div>
                        <div class="font-normal text-blue-900">{{$announcement->attachment}}</div>
                    </div>
                  </th>
                  <td class="px-6 py-4 text-gray-400">
                  {{$announcement->created_at}}
                </td>
                <td class="px-6 py-4 text-gray-400">
                {{ $announcement->user->username }}
                </td>
                <td class="px-6 py-4">
                <a href="{{route('detailsannouncement',$announcement->id)}}" class="font-medium text-blue-800 hover:underline"><button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group hover:bg-blue-900   hover:text-white  focus:ring-4 focus:outline-none focus:ring-cyan-600 ">
<span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white border border-blue-900  rounded-md group-hover:bg-opacity-0">
<i class="fa-solid fa-circle-info " style="color: #00519b;"></i><i class="ml-2">View Details</i>
</span>
</button></a>
</td>
            </tr>
            @endforeach
            @else
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-900 ">Announcements</h5>
            <p class="font-normal text-gray-700 text-blue-500"> There are currently no announcements loaded!.</p>
            </a>
            @endif
        </tbody>
    </table>
</div>
</div>
<span class="pagination" >
    {{$datann->links()}}
</span>
</div>
@endsection
