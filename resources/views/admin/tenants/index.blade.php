@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tenants</h1>
    <a href="{{ route('admin.tenants.create') }}" class="btn btn-primary">Add Tenant</a>
    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
            <tr>
                <td>{{ $tenant->name }}</td>
                <td>{{ $tenant->email }}</td>
                <td>{{ $tenant->phone }}</td>
                <td>
                    <a href="{{ route('admin.tenants.edit', $tenant->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.tenants.destroy', $tenant->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('admin.tenants.show', $tenant->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
