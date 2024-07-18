@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tenant Dashboard</h1>
    <p>Welcome to your dashboard.</p>
    <a href="{{ route('tenant.apartments.index') }}" class="btn btn-primary">View Apartments</a>
    <a href="{{ route('tenant.maintenance.create') }}" class="btn btn-secondary">Submit Maintenance Request</a>
    <a href="{{ route('tenant.feedback.create') }}" class="btn btn-success">Give Feedback</a>
</div>
@endsection
