@extends('shared.master')

@section('title')
Dashboard
@endsection

@section('css')
@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <strong>Quick Start</strong> <span class="text-muted small">(Your common tasks):</span>
                    </div>
                    <div class="card-body border-0">

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script>

        setSideBar('#menu-dashboard');

    </script>


@endsection
