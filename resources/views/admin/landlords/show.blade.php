@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Landlord Details</h1>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td>{{ $landlord->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $landlord->email }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $landlord->phone }}</td>
        </tr>
        <!-- Add more fields as necessary -->
    </table>
    <a href="{{ route('admin.landlords.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
