<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome Ms / Mrs {{$user['name']}}</h2>
<br/>
thank you for register your nickname is  {{$user['email']}}'dir ,You can activate your membership by clicking the link below the link
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Verify My Account</a>
</body>

</html>

