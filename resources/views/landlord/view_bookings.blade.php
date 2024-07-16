<!-- Inside view_bookings.blade.php -->
@foreach ($bookings as $booking)
    <!-- Display booking details -->
    <p>Tenant: {{ $booking->tenant_name }}</p>
    <p>Apartment: {{ $booking->apartment->name }}</p>
    <!-- Add more fields as needed -->
@endforeach
