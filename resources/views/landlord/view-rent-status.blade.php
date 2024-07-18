<!-- resources/views/landlord/view-rent-status.blade.php -->

<h1>Rent Status for Application #{{ $application->id }}</h1>

<p>Tenant Name: {{ $application->tenant->name }}</p>
<p>Amount Due: {{ $application->amount_due }}</p>
<p>Rent Paid: {{ $application->rent_paid ? 'Yes' : 'No' }}</p>

@if (!$application->rent_paid)
    <form action="{{ route('landlord.markRentPaid', $application) }}" method="POST">
        @csrf
        <button type="submit">Mark as Paid</button>
    </form>
@else
    <form action="{{ route('landlord.markRentNotPaid', $application) }}" method="POST">
        @csrf
        <button type="submit">Mark as Not Paid</button>
    </form>
@endif
