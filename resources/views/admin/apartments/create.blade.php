@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Apartment</h1>
    <form action="{{ route('admin.apartments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" id="location" required>
        </div>
        <div class="form-group">
            <label for="rent">Rent</label>
            <input type="number" name="rent" class="form-control" id="rent" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
