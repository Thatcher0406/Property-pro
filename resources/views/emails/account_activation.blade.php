<!DOCTYPE html>
<html>
<head>
    <title>Account Activation</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Thank you for registering. Please click the button below to activate your account:</p>
    <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => $user->activation_token]) }}">
        Activate Account
    </a>
    <p>If you did not create an account, no further action is required.</p>
    <p>Regards,<br>Property Management Team</p>
</body>
</html>
