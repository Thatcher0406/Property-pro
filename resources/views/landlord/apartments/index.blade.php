@extends('layouts.landlord')

@section('content')
    <h1>Apartments</h1>
    <a href="{{ route('landlord.apartments.create') }}">Add New Apartment</a>
    @foreach($apartments as $apartment)
        <div>
            <p>{{ $apartment->name }}</p>
            <a href="{{ route('landlord.apartments.edit', $apartment) }}">Edit</a>
            <form action="{{ route('landlord.apartments.destroy', $apartment) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
