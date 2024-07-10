@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Apartment</h1>
    <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $apartment->name }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" id="location" value="{{ $apartment->location }}" required>
        </div>
        <div class="form-group">
            <label for="rent">Rent</label>
            <input type="number" name="rent" class="form-control" id="rent" value="{{ $apartment->rent }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
