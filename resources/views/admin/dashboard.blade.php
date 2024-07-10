@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tenants</h5>
                    <p class="card-text">{{ $tenantCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Landlords</h5>
                    <p class="card-text">{{ $landlordCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Apartments</h5>
                    <p class="card-text">{{ $apartmentCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
