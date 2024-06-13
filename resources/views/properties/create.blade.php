@extends('layouts.app')

@section('content')
    <h1>Create Property</h1>
    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="units">Units</label>
            <input type="number" name="units" id="units" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
