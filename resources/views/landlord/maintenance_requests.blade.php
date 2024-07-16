@extends('layouts.app')

@section('content')
    <h1>Maintenance Requests</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Tenant Name</th>
                <th>Apartment</th>
                <th>Request</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($maintenanceRequests as $request)
                <tr>
                    <td>{{ $request->tenant->name }}</td>
                    <td>{{ $request->apartment->name }}</td>
                    <td>{{ $request->request }}</td>
                    <td>{{ $request->status }}</td>
                    <td>
                        @if($request->status == 'pending')
                            <form action="{{ route('landlord.maintenance.respond', $request->id) }}" method="POST">
                                @csrf
                                <textarea name="response" required></textarea>
                                <button type="submit">Respond</button>
                            </form>
                        @else
                            <span>{{ $request->response }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
