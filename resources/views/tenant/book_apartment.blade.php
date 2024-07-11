
@extends('layouts.app')

@section('content')
    <h1>Book Apartment: {{ $apartment->name }}</h1>
    <form action="{{ route('apartments.book.store', $apartment->id) }}" method="POST">
        @csrf
        <div>
            <label for="booked_at">Booking Date:</label>
            <input type="date" name="booked_at" id="booked_at" required>
        </div>
        <button type="submit">Book Apartment</button>
    </form>
@endsection
