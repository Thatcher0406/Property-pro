@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book an Appointment to View {{ $apartment->name }}</h2>
    <form action="{{ route('tenant.apartments.book.store', $apartment->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
@endsection
