@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Apartments</h1>
    @foreach ($apartments as $apartment)
        <div class="apartment">
            <h2>{{ $apartment->name }}</h2>
            <p>{{ $apartment->description }}</p>
            <a href="{{ route('tenant.apartments.book', $apartment->id) }}" class="btn btn-primary">Book Appointment</a>
            <a href="{{ route('tenant.apartments.apply', $apartment->id) }}" class="btn btn-secondary">Apply to Rent</a>
        </div>
    @endforeach
</div>
@endsection
