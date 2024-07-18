<!DOCTYPE html>
<html>
<head>
    <title>Application Denied</title>
</head>
<body>
    <h1>Your Application is Denied</h1>
    <p>Dear {{ $application->tenant->name }},</p>
    <p>We regret to inform you that your application to rent the apartment has been denied.</p>
    <p><strong>Apartment:</strong> {{ $application->apartment->name }}</p>
    <p>Thank you.</p>
</body>
</html>
