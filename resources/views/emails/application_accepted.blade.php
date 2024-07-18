<!DOCTYPE html>
<html>
<head>
    <title>Application Accepted</title>
</head>
<body>
    <h1>Your Application is Accepted</h1>
    <p>Dear {{ $application->tenant->name }},</p>
    <p>Your application to rent the apartment has been accepted.</p>
    <p><strong>Apartment:</strong> {{ $application->apartment->name }}</p>
    <p><strong>Rent Amount:</strong> KSh {{ $application->apartment->rent_amount }}</p>
    <p>To proceed with the payment, please click the button below:</p>
    <a href="{{ route('tenant.payRent', $application->id) }}" style="display: inline-block; padding: 10px 20px; color: white; background-color: blue; text-decoration: none;">Proceed to Pay Rent</a>
    <p>Thank you.</p>
</body>
</html>
