<!-- resources/views/auth/verify-email.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email Address</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>Before proceeding, please check your email for a verification link.</p>
    <p>If you did not receive the email, please request another one:</p>
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Click here to request another</button>
    </form>
</body>
</html>