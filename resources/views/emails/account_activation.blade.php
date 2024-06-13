<!DOCTYPE html>
<html>
<head>
    <title>Account Activation</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Thank you for registering. Please click the button below to activate your account:</p>
    <a href="{{ route('activate', ['id' => $user->id, 'token' => $user->activation_token]) }}" style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #007bff; text-decoration: none;">Activate Account</a>
    <p>If you did not create an account, no further action is required.</p>
    <p>Regards,<br>Property Management Team</p>
</body>
</html>
