<button id="dropdownUsersButton" data-dropdown-toggle="dropdownUsers" class="transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-110  duration-300 relative inline-flex items-center text-sm font-medium text-center text-blue-900 hover:text-gray-900 focus:outline-none" type="button">
<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
<path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
</svg>
</button>
<div id="dropdownUsers" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow " aria-labelledby="dropdownUsersButton">
  <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50"id="notification_count">
  Notifications({{Auth::User()->unreadNotifications->count()}}) 
  <a href="/MarkAsRead_all" class="font-medium text-blue-800 hover:underline">Mark as read all</a>
  </div>
  @foreach(Auth()->User()->unreadNotifications as $notification)
  <div class="divide-y divide-gray-100">
   @if($notification->type =='App\Notifications\announcementnoti')
    <a href="#" class="flex px-4 py-3 hover:bg-gray-100 ">
      @elseif($notification->type =='App\Notifications\reportsnoti')
    <a href="#" class="flex px-4 py-3 hover:bg-gray-100 ">
      @else
    <a href="#" class="flex px-4 py-3 hover:bg-gray-100 ">
      @endif
      <div class="w-full ps-3">
          <div class="text-gray-500 text-sm mb-1.5 "><span class="font-semibold text-gray-900 ">{{$notification->data['user']}}</span>: {{$notification->data['title']}}<br/> <h7>{{$notification->created_at}}</h> </div>
      </div>
    </a>
  </div>
  @endforeach
</div>

