@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tenant Applications</h1>
    @foreach($applications as $application)
        <div>
            <p>Tenant: {{ $application->tenant->name }}</p>
            <p>Apartment: {{ $application->apartment->name }}</p>
            <p>Status: {{ $application->status }}</p>
            <form action="{{ route('landlord.applications.approve', $application->id) }}" method="POST">
                @csrf
                <button type="submit">Approve</button>
            </form>
            <form action="{{ route('landlord.applications.reject', $application->id) }}" method="POST">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
