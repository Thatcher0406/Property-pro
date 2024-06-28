@extends('layouts.app')

@section('content')
    <h1>Landlords</h1>
    <a href="{{ route('landlords.create') }}" class="btn btn-primary">Add Landlord</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($landlords as $landlord)
                <tr>
                    <td>{{ $landlord->name }}</td>
                    <td>{{ $landlord->email }}</td>
                    <td>
                        <a href="{{ route('landlords.edit', $landlord->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('landlords.destroy', $landlord->id) }}" method="POST" style="display:inline-block;">
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
