<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h1>Hello,</h1>
    <p>You are requested to reset your password. Please click the button below to reset your password:</p>
    <a href="{{ url('password/reset', $token) }}" style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #007bff; text-decoration: none;">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Regards,<br>Property Management Team</p>
</body>
</html>
