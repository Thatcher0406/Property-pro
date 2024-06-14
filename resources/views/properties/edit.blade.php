@extends('layouts.app')

@section('content')
    <h1>Edit Property</h1>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $property->name }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $property->address }}">
        </div>
        <div class="form-group">
            <label for="units">Units</label>
            <input type="number" name="units" id="units" class="form-control" value="{{ $property->units }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
