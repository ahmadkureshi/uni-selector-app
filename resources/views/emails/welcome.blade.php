<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Uni Selector</title>
</head>
<body>
<h1>Welcome, {{ $user->name }}!</h1>
<p>Thank you for registering on our platform. Here are your login credentials:</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Password:</strong> {{ $password }}</p>
<p>You can log in at <a href="{{ route('login') }}">this link</a>.</p>
<p>Please change your password after logging in for security purposes.</p>
<br>
<p>Best regards,<br>Team Uni Selector</p>
</body>
</html>
