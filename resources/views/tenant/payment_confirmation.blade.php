<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body>
    <h1>Payment Confirmation</h1>
    <p>Dear {{ $application->tenant->name }},</p>
    <p>Thank you for proceeding with the rent payment for the apartment {{ $application->apartment->name }}.</p>
    <p>You will receive an Mpesa payment prompt on your phone number {{ $application->tenant->phone_number }} shortly.</p>
    <p><strong>Rent Amount:</strong> KSh {{ $application->apartment->rent_amount }}</p>
    <p>Thank you.</p>
</body>
</html>
