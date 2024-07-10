@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tenant Details</h1>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td>{{ $tenant->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $tenant->email }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $tenant->phone }}</td>
        </tr>
        <!-- Add more fields as necessary -->
    </table>
    <a href="{{ route('admin.tenants.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
