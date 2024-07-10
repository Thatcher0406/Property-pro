@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Apartments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Apartment Name</th>
                <th>Location</th>
                <th>Rent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
            <tr>
                <td>{{ $apartment->name }}</td>
                <td>{{ $apartment->location }}</td>
                <td>{{ $apartment->rent }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
