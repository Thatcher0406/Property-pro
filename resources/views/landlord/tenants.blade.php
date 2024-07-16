@extends('layouts.app')

@section('content')
    <h1>Tenants</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Apartment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->apartment->name }}</td>
                    <td>
                        <a href="{{ route('landlord.tenants.rent.status', $tenant->id) }}">View Rent Status</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
