@extends('layouts.app')

@section('content')
    <h1>Apply for Rent: {{ $apartment->name }}</h1>
    <form action="{{ route('tenant.apartments.apply.store', $apartment->id) }}" method="POST">
        @csrf
        <div>
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="phone">Your Phone:</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <div>
            <label for="notes">Additional Notes:</label>
            <textarea name="notes" id="notes" rows="4"></textarea>
        </div>
        <button type="submit">Submit Application</button>
    </form>
@endsection
