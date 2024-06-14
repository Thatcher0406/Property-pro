@extends('layouts.app')

@section('content')
    <h1>Edit Payment</h1>
    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $payment->date }}">
        </div>
        <div class="form-group">
            <label for="tenant_id">Tenant</label>
            <select name="tenant_id" id="tenant_id" class="form-control">
                @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}" @if($tenant->id == $payment->tenant_id) selected @endif>{{ $tenant->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
