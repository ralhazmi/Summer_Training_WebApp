<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Users </h1>
    @foreach($users as $user)
    <p>{{$user->username}}</p></br>
    <p>{{$user->email}}</p></br>
    <p>{{$user->major}}</p></br>
    @endforeach
</body>
</html>
