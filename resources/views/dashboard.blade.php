@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p>Are you a:</p>
                    <div class="btn-group" role="group" aria-label="User roles">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Administrator</a>
                        <a href="{{ route('tenant.dashboard') }}" class="btn btn-secondary">Tenant</a>
                        <a href="{{ route('landlord.dashboard') }}" class="btn btn-success">Landlord</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
