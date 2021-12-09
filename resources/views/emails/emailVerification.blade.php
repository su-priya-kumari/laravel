<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Email Verification Mail</h1>
    <h3>Welcome to Our Hospital Website {{ $user->firstname}}</h3>
    <p>
        Please verify your email with bellow link: 
        {{-- Click Here <a href="{{ url('/user/verify/' .$user->verifyUser->token)}}">Verify Email</a> --}}
    </p>
   
</body>
</html>