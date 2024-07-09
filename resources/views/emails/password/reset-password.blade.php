<!DOCTYPE html>
<html>
<head>
    <title>Reset Password Notification</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>Please click the button below to reset your password:</p>
    <a href="{{ url('reset-password/'.$token.'?email='.urlencode($user->email)) }}">
        Reset Password
    </a>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Regards,<br>Property Management Team</p>
</body>
</html>

