@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Landlord Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}</p>
    <a href="{{ route('landlord.applications') }}"class="btn btn-primary">View Applications</a>
    <a href="{{ route('landlord.apartments.index') }}"class="btn btn-primary">Manage Apartments</a>
    <a href="{{ route('landlord.maintenance.view') }}"class="btn btn-primary">View Maintenance Requests</a>
    <a href="{{ route('landlord.feedback.view') }}"class="btn btn-primary">View Feedback</a>
    <a href="{{ route('landlord.bookings') }}" class="btn btn-primary">View Bookings</a>
</div>
@endsection
