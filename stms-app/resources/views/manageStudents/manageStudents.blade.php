@extends('Layout.Sidebar')
@section('title','Durba | Students')
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .bg-sky-500 {
    --tw-bg-opacity: 1;
    background-color: #51c3cd30 !important;
}
</style>
@if($errors->any())
    <div class="m-2">
        <ul>
            @foreach($errors->all() as $error)
              <li>
              <div class="flex justify-end">
              <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
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


<div class="flex justify-end rounded-md ">
<div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
    <!-- Modal toggle -->
    <button data-modal-target="large-modal1" data-modal-toggle="large-modal1" class="block w-full md:w-auto text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">+ Add Student
    </button>
</div>
</div>
<div id="large-modal1" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
         <!-- Modal header -->
           <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-medium  "style="color:#00519B;">
                    Add Student
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="large-modal1">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{route('add.students')}}" method="POST" class="space-y-6 " style="width:80%; margin:0 auto;">
                @csrf
                <div class="flex mb-4">
                <div class="w-1/2 mr-2 ">
                    <label for="id" class="block mb-2 text-sm font-medium "style="color:#00519B;">University ID</label>
                    <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" placeholder="411......" required />
                  </div>
                   <div class="w-1/2 ">
                        <label for="company" class="block mb-2 text-sm font-medium "style="color:#00519B;">Training Entity</label>
                        <input type="text" name="company" id="company" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;"  placeholder="Training Company" />
                    </div>
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
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="large-modal1" type="submit"  class="text-white bg-blue-900 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add student</button>
                </div>
            </form>
         </div>
    </div>
</div>
<div class="relative mt-2 overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center rtl:text-right text-blue-900 ">
        <thead class="text-xs text-blue-900 uppercase ">
            <tr>
                <th scope="col" class="px-6 py-3 bg-sky-500 ">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 bg-sky-500 ">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Hours earned
                </th>
                <th scope="col" class="px-6 py-3 bg-sky-500">
                    Training Entity
                </th>
                <th scope="col" class="px-6 py-3 ">
                Activation
                </th>
                <th scope="col" class="px-6 py-3 bg-sky-500">
                    Actions
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $student)
            <tr class="border-b border-gray-200 ">
                <th scope="row" class="px-6 py-4 font-medium text-blue-900 whitespace-nowrap bg-sky-500 ">
                    {{$student->id}}
                </th>
                <td class="px-6 py-4 ">
                {{$student->username}}
                </td>
                <td class="px-6 py-4 bg-sky-500 ">
                {{$student->email}}
                </td>
                <td class="px-6 py-4  ">
                {{$student->hours}}
                </td>
                <td class="px-6 py-4 bg-sky-500 ">
                {{$student->company}}
                </td>
                @if($student->activation == 1)
                <td class="px-6  py-4">
                <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Active
                    </div>
                </td>
                @else
                <td class="px-6  py-4">
                <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Deactive
                    </div>
                </td>
                @endif
                <td class="px-6 bg-sky-500  py-4">
                <div class="inline-flex rounded-md shadow-sm" role="group">

                    <div class="flex justify-end rounded-md ">
                        <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                            <!-- Modal toggle -->
                            <button data-modal-target="large-modal-{{ $student->id }}" data-modal-toggle="large-modal-{{ $student->id }}" class="px-4 py-2 text-sm font-medium text-blue-900 bg-sky-500  border border-blue-900 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 " type="button">Edit</button>
                        </div>
                    </div>
                    <div id="large-modal-{{ $student->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative w-full max-w-4xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow ">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                                    <h3 class="text-xl font-medium text-blue-900 ">
                                        Edit Student
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="large-modal-{{ $student->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('update.students', ['student' => $student]) }}" method="post" style="width:80%; margin:0 auto;">
                                   @csrf
                                   @method('put')
                                    <div class="flex mb-4">
                                        <div class="w-1/2 mr-2 ">
                                            <label for="id" class="block mb-2 text-sm font-medium "style="color:#00519B;">University ID</label>
                                            <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" value="{{$student->id}}" readonly />
                                        </div>
                                        <div class="w-1/2 ">
                                            <label for="company" class="block mb-2 text-sm font-medium "style="color:#00519B;">Training Entity</label>
                                            <input type="text" name="company" id="company" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;"  value="{{$student->company}}" />
                                        </div>
                                    </div>
                                    <div class="flex mb-4">
                                        <div class="w-1/2 mr-2 ">
                                            <label for="username" class="block mb-2 text-sm font-medium "style="color:#00519B;">Full Name</label>
                                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" value="{{$student->username}}"  />
                                        </div>
                                        <div class="w-1/2 ">
                                            <label for="major" class="block mb-2 text-sm font-medium "style="color:#00519B;">Department</label>
                                            <input type="text" name="major" id="major" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" value="{{$student->major}}" />
                                        </div>
                                    </div>
                                    <div class="flex mb-4">
                                        <div class="w-1/2 mr-2 ">
                                            <label for="email" class="block mb-2 text-sm font-medium "style="color:#00519B;"> University email</label>
                                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" value="{{$student->email}}" readonly />
                                        </div>
                                        <div class="w-1/2 ">
                                            <label for="hours" class="block mb-2 text-sm font-medium "style="color:#00519B;">Hours earned</label>
                                            <input type="number"  name="hours" id="hours" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " style="color:#00519B;" value="{{$student->hours}}" />
                                            <input type="hidden" name="password" id="password" placeholder="••••••••" style="color:#00519B;" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "value="{{$student->password}}" required />
                                        </div>
                                    </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="large-modal-{{ $student->id }}" type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Edits</button>
                                </div>
                                </form>
                              </div>
                            </div>
                            </div>

                            @if($student->activation == 1)
                            <a href="{{ route('update.Activation', ['id' => $student->id, 'status' => 2]) }}">
                                <button type="button" class="activation-button px-4 py-2 text-sm font-medium text-blue-900 bg-sky-500  border border-blue-900 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                                    Deactivate
                                </button></a>
                            @else
                            <a href="{{ route('update.Activation', ['id' => $student->id, 'status' => 1]) }}">
                                <button type="button" class="activation-button px-4 py-2 text-sm font-medium text-blue-900 bg-sky-500 border border-blue-900 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
                                    Activate
                                </button></a>
                            @endif
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


