<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>User</h1>
    <p>{{$user->username}}</p></br>
    <p>{{$user->email}}</p></br>
    <p>{{$user->major}}</p></br>
    <button ><a href="{{route('logout')}}">log out</a></button>
</body>
</html>
