@extends('layouts.landlord')

@section('content')
    <h1>Add Apartment</h1>
    <form action="{{ route('landlord.apartments.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Apartment Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="number" name="units" placeholder="Number of Units" required>
        <input type="text" name="location" placeholder="Location" required>
        <input type="number" name="rent" placeholder="Rent Amount" required>
        <button type="submit">Add Apartment</button>
    </form>
@endsection
