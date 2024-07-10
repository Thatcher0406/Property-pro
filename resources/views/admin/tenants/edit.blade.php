@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tenant</h1>
    <form action="{{ route('admin.tenants.update', $tenant->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $tenant->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $tenant->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ $tenant->phone }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
