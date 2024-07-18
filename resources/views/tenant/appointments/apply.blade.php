@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Apply to Rent {{ $apartment->name }}</h2>
    <form action="{{ route('tenant.apartments.apply.store', $apartment->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="notes">Notes:</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection
