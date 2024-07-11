@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Apartments</h1>
    <a href="{{ route('landlord.apartments.create') }}">Add New Apartment</a>
    @foreach($apartments as $apartment)
        <div>
            <p>Name: {{ $apartment->name }}</p>
            <p>Location: {{ $apartment->location }}</p>
            <p>Price: {{ $apartment->price }}</p>
            <a href="{{ route('landlord.apartments.edit', $apartment->id) }}">Edit</a>
            <form action="{{ route('landlord.apartments.destroy', $apartment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
