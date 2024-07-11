
@extends('layouts.app')

@section('content')
    <h1>Available Apartments</h1>
    <ul>
        @foreach ($apartments as $apartment)
            <li>
                {{ $apartment->name }} - {{ $apartment->location }} - {{ $apartment->rent }} per month
                <a href="{{ route('apartments.book', $apartment->id) }}">Book</a>
            </li>
        @endforeach
    </ul>
@endsection
