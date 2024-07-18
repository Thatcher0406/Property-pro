<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmed</title>
</head>
<body>
    <h1>Your Appointment is Confirmed</h1>
    <p>Dear {{ $appointment->tenant->name }},</p>
    <p>Your appointment to visit the apartment has been confirmed.</p>
    <p><strong>Apartment:</strong> {{ $appointment->apartment->name }}</p>
    <p><strong>Date:</strong> {{ $appointment->date }}</p>
    <p><strong>Time:</strong> {{ $appointment->time }}</p>
    <p>Thank you.</p>
</body>
</html>
