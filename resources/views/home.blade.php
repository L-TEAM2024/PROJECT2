@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
       

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Top row of cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5>Total Users</h5>
                            <p class="h3">1,245</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5>Active Users</h5>
                            <p class="h3">945</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5>New Orders</h5>
                            <p class="h3">128</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Section -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white text-center">
                            <h4>{{ __('Dashboard') }}</h4>
                        </div>
                        <div class="card-body p-4">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="text-center">
                                <h5>{{ __('You are logged in!') }}</h5>
                                <p class="text-muted">{{ __('Welcome to your dashboard.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
