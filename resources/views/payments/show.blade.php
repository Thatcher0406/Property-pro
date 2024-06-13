@extends('layouts.app')

@section('content')
    <h1>Payment Details</h1>
    <div>
        <strong>Amount:</strong> {{ $payment->amount }}
    </div>
    <div>
        <strong>Date:</strong> {{ $payment->date }}
    </div>
    <div>
        <strong>Tenant:</strong> {{ $payment->tenant->name }}
    </div>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
@endsection
