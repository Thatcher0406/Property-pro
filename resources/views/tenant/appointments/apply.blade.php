@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Apply to Rent {{ $apartment->name }}</h2>
    <form action="{{ route('tenant.apartments.apply.store', $apartment->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection
