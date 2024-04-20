@extends('Layout.Sidebar')
@section('title','Durba | Reports')
@section('body')

@if($message = Session::get('Success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
<strong> {{ $message }}  </strong>
</div>
@endif



     <div class="container">
     <div class="row">
     <div class="col-sm-12">
     <form method="POST" action="/StudentReports/store" encrypt="multipart/form-data">
      @csrf
      <div>


     <form action="/action_page.php">
     <div>
                        <label for="userTo" class="block mb-2 text-sm font-medium "style="color:#00519B;">Send To: </label>
                        <select id="userTo" name="userTo" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "style="color:#00519B;">
                            <option value="">Select Supervisor...</option>
                            @foreach($users as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->username }}</option>
                            @endforeach
                        </select>
    </div>
     <label for="report_title">Report Title</label>
     <input type="text" id="fname" name="report_title" placeholder="Your report title..">
     @if($errors->has('report_title'))
    <span class="font-medium">{{ $errors->first('report_title') }} </span>
    </div>
    @endif


    <label for="attachment">Upload file</label>
    <form action="/action_page.php">
    <input type="file" id="attachment" name="attachment">
    </form>
    @if($errors->has('attachment'))
    <span class="font-medium">{{ $errors->first('attachment') }} </span>
    </div>
    @endif


    <label for="date">Date</label>
    <input type="date" id="date" name="date">
    @if($errors->has('date'))
    <span class="font-medium">{{ $errors->first('date') }} </span>
    </div>
    @endif


    <form action="/action_page.php">
    <label for="user_id">Student ID</label>
    <input type="integer" id="userid" name="user_id" placeholder="411201989..">
    @if($errors->has('user_id'))
    <span class="font-medium">{{ $errors->first('user_id') }} </span>
    </div>
    @endif


    <input type="submit" value="Submit">
    </form>
    </div>

    </body>
@endsection
