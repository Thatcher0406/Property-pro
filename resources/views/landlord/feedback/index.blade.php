@extends('layouts.app')

@section('content')
    <h1>Feedback</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Tenant Name</th>
                <th>Apartment</th>
                <th>Feedback</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedback as $feedback)
                <tr>
                    <td>{{ $feedback->tenant->name }}</td>
                    <td>{{ $feedback->apartment->name }}</td>
                    <td>{{ $feedback->feedback }}</td>
                    <td>{{ $feedback->status }}</td>
                    <td>
                        @if($feedback->status == 'pending')
                            <form action="{{ route('landlord.feedback.respond', $feedback->id) }}" method="POST">
                                @csrf
                                <textarea name="response" required></textarea>
                                <button type="submit">Respond</button>
                            </form>
                        @else
                            <span>{{ $feedback->response }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
