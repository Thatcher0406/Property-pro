
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Feedback</h1>
    <form method="POST" action="{{ route('tenant.giveFeedback') }}">
        @csrf
        <div class="form-group">
            <label for="feedback">Feedback</label>
            <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
