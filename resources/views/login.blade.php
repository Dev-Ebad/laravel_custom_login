<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{route('login_req')}}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Enter email">
        <input type="text" name="password" placeholder="Enter password">
        <input type="submit" name="login" value="login">
    </form>
    
</body>
</html>