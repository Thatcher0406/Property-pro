@extends('layouts.app')

@section('content')
    <h1>Properties</h1>
    <a href="{{ route('properties.create') }}" class="btn btn-primary">Add Property</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Units</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->units }}</td>
                    <td>
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
