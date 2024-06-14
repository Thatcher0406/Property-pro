@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tenant Dashboard') }}</div>
                <div class="card-body">
                    <p>{{ __('Welcome to the Tenant dashboard!') }}</p>
                    <!-- Add client functionalities here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
