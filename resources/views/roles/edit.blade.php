@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
