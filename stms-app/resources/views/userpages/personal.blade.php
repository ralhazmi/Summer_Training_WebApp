@extends('authusers.header')
@section('title','personal')
@section('body')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* Add your CSS styles here */
        body {
            background: linear-gradient(150deg, rgba(0,81,155,1) 0%, rgba(0,170,173,1) 50%);
            font-family: Arial, sans-serif;
            color: #F5F7FA;
            padding: 20px;
        }
        .profile-info {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff; /* Solid white background */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-info h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #00519B;
            margin-bottom: 20px;
        }
        .profile-info p {
            color: #00519B;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="h-screen mt-8 flex items-center justify-center w-full">
        <div class="w-full max-w-xl p-4 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 profile-info">
            <h1>User Profile</h1>
            <p>Username: {{$user->username}}</p>
            <p>User ID: {{$user->id}}</p>
            <p>Email: {{$user->email}}</p>
            <p>Major: {{$user->major}}</p>
        </div>
    </div>
</body>
</html>
@endsection
