@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tenant Dashboard</h1>
    <a href="{{ route('tenant.apartments.index') }}" class="btn btn-primary">View Available Apartments</a>
    <a href="{{ route('tenant.maintenance.create') }}" class="btn btn-primary">Submit Maintenance Request</a>
    <a href="{{ route('tenant.feedback.create') }}" class="btn btn-primary">Give Feedback</a>
</div>
@endsection
