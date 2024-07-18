@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submit Feedback</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tenant.feedback.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="message">Feedback</label>
                            <textarea id="message" name="message" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
