@extends('layouts.app')

@section('content')
    <h1>Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">Add Payment</a>
    <table class="table">
        <thead>
            <tr>
                <th>Amount</th>
                <th>Date</th>
                <th>Tenant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->tenant->name }}</td>
                    <td>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
