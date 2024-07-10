@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Landlords</h1>
    <a href="{{ route('admin.landlords.create') }}" class="btn btn-primary">Add Landlord</a>
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
            @foreach ($landlords as $landlord)
            <tr>
                <td>{{ $landlord->name }}</td>
                <td>{{ $landlord->email }}</td>
                <td>{{ $landlord->phone }}</td>
                <td>
                    <a href="{{ route('admin.landlords.edit', $landlord->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.landlords.destroy', $landlord->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('admin.landlords.show', $landlord->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
