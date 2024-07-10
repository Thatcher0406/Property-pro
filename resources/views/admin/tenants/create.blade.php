@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Tenant</h1>
    <form action="{{ route('admin.tenants.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
