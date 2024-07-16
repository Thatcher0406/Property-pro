@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Apartment</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('landlord.apartments.update', $apartment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $apartment->name }}">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $apartment->address }}">
        </div>

        <div class="form-group">
            <label for="units">Units:</label>
            <input type="number" name="units" id="units" class="form-control" value="{{ $apartment->units }}">
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $apartment->location }}">
        </div>

        <div class="form-group">
            <label for="rent">Rent:</label>
            <input type="number" name="rent" id="rent" class="form-control" value="{{ $apartment->rent }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Apartment</button>
    </form>
</div>
@endsection
