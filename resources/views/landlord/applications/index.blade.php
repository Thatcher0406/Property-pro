@extends('layouts.landlord')

@section('content')
    <h1>Applications</h1>
    @foreach($applications as $application)
        <div>
            <p>Tenant: {{ $application->tenant->name }}</p>
            <p>Apartment: {{ $application->apartment->name }}</p>
            <p>Status: {{ $application->status }}</p>
            <form action="{{ route('landlord.applications.approve', $application) }}" method="POST">
                @csrf
                <button type="submit">Accept</button>
            </form>
            <form action="{{ route('landlord.applications.reject', $application) }}" method="POST">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </div>
    @endforeach
@endsection
