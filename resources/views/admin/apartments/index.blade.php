@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Apartments</h1>
    <a href="{{ route('admin.apartments.create') }}" class="btn btn-primary">Add Apartment</a>
    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Rent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
            <tr>
                <td>{{ $apartment->name }}</td>
                <td>{{ $apartment->location }}</td>
                <td>{{ $apartment->rent }}</td>
                <td>
                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
