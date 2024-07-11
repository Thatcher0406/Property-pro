@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Submit Feedback</h1>
        <form action="{{ route('tenant.giveFeedback') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" id="feedback" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
