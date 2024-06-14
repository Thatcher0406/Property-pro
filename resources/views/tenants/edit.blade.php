@extends('layouts.app')

@section('content')
    <h1>Edit Tenant</h1>
    <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $tenant->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $tenant->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
