@extends('shared.master')

@section('title')
Competitor Research
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
                        <h6 class="h2 text-white d-inline-block mb-0">Competitor Research</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body border-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-shop"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-alternative" placeholder="Search for Competitor Username or ID">
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="/img/search.svg" alt="">
    </div>

@endsection

@section('scripts')

    <script>

        setSideBar('#menu-search');

    </script>


@endsection
