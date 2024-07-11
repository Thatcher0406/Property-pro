
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Make a Payment</h2>
    <form action="{{ route('payments.initiate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div>
@endsection
