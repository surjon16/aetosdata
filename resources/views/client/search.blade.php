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
                            <input id="userid" type="text" class="form-control form-control-alternative" placeholder="Search for Competitor Username or ID">
                            <button type="button" class="btn btn-primary ml-2" onclick="Search()">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-1">
                        <div class="row">
                            <div class="col">
                                <strong>Products List</strong>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product Name</th>
                                <th scope="col">30 Days Sales</th>
                                <th scope="col">Total Sold</th>
                                <th scope="col">Current Price</th>
                                {{-- <th scope="col">Address</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="product_list" class="list"></tbody>
                    </table>
                    {{-- <div class="card-footer border-1">
                        <h5 class="d-inline float-left">Total: {{ $clients->from == $clients->total ? $clients->from : $clients->from . ' - ' . $clients->to }} of {{ $clients->total }}</h5>
                        <nav>
                            <ul class="pagination pagination-sm justify-content-end">
                                @foreach ($clients->links as $link)
                                    @if($loop->first)
                                        <li class="page-item {{ $clients->prev_page_url == null ? 'disabled' : '' }}">
                                            <a class="page-link" href="/admin/clients?page={{ $clients->current_page - 1 }}">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                    @elseif($loop->last)
                                        <li class="page-item {{ $clients->next_page_url == null ? 'disabled' : '' }}">
                                            <a class="page-link" href="/admin/clients?page={{ $clients->current_page + 1 }}">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item {{ $clients->current_page == $link->label ? 'active' : '' }}"><a class="page-link" href="/admin/clients?page={{ $link->label }}">{{ $link->label }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script>

        setSideBar('#menu-search')

        // Controller.Post('/api/get/item', {}).done(function(_result) {
        //     console.log(_result)
        // })

        function Search() {

            data = {
                'userid' : $('#userid').val(),
                'entries' : '100',
                'page' : '1',
            }

            product_list = document.getElementById('product_list')
            product_list.innerHTML = ''

            Controller.Post('/api/find/itemsadvanced', data).done(function(result) {
                items = []
                console.log(result)

                if(result.searchResult.count>0) {

                    result.searchResult.item.forEach(item => {

                        tr = document.createElement('tr')
                        tr.innerHTML =
                            '<th scope="row">' +
                                '<div class="media align-items-center">' +
                                    '<a href="#" class="avatar p-1">' +
                                        '<img alt="Image placeholder" src="'+ item.galleryInfoContainer.galleryURL[2].value +'">' +
                                    '</a>' +
                                '</div>' +
                            '</th>' +
                            '<td class="text-wrap"><a href="'+ item.viewItemURL +'" target=_blank>' + item.title + '</a></td>' +
                            '<td>' +  + '</td>' +
                            '<td>' +  + '</td>' +
                            '<td>' + item.sellingStatus.currentPrice.currencyId + ' ' + item.sellingStatus.currentPrice.value + '</td>' +
                            '<td class="text-right">' +
                                '<div class="dropdown">' +
                                    '<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                    '<i class="fas fa-ellipsis-v"></i>' +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">' +
                                        '<a class="dropdown-item" href="#">Action</a>' +
                                        '<a class="dropdown-item" href="#">Another action</a>' +
                                        '<a class="dropdown-item" href="#">Something else here</a>' +
                                    '</div>' +
                                '</div>' +
                            '</td>'

                        product_list.append(tr)
                    })
                }


            })
        }

    </script>


@endsection
