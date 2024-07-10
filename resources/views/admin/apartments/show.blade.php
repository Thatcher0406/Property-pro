@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Apartment Details</h1>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td>{{ $apartment->name }}</td>
        </tr>
        <tr>
            <th>Location:</th>
            <td>{{ $apartment->location }}</td>
        </tr>
        <tr>
            <th>Rent:</th>
            <td>{{ $apartment->rent }}</td>
        </tr>
        <!-- Add more fields as necessary -->
    </table>
    <a href="{{ route('admin.apartments.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
