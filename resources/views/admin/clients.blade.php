@extends('shared.master')

@section('title')
Clients
@endsection

@section('css')
@endsection

@section('modal')
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content card bg-secondary shadow">
                <div class="modal-header card-header bg-white border-0">
                    <h4 class="card-title">Client Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input id="id" type="hidden" value="-1">
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Full Name</label>
                                <input id="fullname" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input id="email" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Phone</label>
                                <input id="phone" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input id="password" type="password" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" data-dismiss="modal" onclick="SaveItem()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Clients</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-1">
                        <div class="row">
                            <div class="col">
                                <strong>Clients</strong> <span class="text-muted small">(Accounts registered):</span>
                                <button class="btn btn-sm btn-primary float-right" type="button" onclick="AddNewClient()">Add New Item</button>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Client ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                {{-- <th scope="col">Address</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($clients->data as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->fullname }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    {{-- <td>{{ $data->address }}</td> --}}
                                    <td>
                                        <a type="button" class="mr-1 text-light" onclick="EditClient({{ json_encode($data) }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a type="button" class="mr-1 text-light" onclick="DeleteClient({{ json_encode($data) }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer border-1">
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
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script>

        setSideBar('#menu-clients');

        var modal_default   = '#modal-default'
        //

        function AddNewClient() {

            $('#id').val('-1')
            $('#fullname').val('')
            $('#email').val('')
            $('#phone').val('')
            $('#password').val('')

            $(modal_default).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function EditClient(e) {

            console.log(e)

            $('#id').val(e.id)
            $('#fullname').val(e.fullname)
            $('#email').val(e.email)
            $('#phone').val(e.phone)
            $('#password').val(e.password)

            $(modal_default).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function DeleteClient(e) {
            bootbox.confirm({
                message: "Delete item?",
                buttons: {
                    confirm: {
                        label: 'Delete',
                        className: 'btn-sm btn-danger'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-sm btn-info'
                    }
                },
                callback: function(result) {
                    if(result) {
                        data = {
                            'id' : e.id
                        }
                        Controller.Post('/api/delete/client', data).done(function(result) {
                            console.log(result)
                            window.location.reload()
                        })
                    }
                }
            });

        }

        function SaveItem() {
            data = {
                'id'        : $('#id').val(),
                'fullname'  : $('#fullname').val(),
                'email'     : $('#email').val(),
                'phone'     : $('#phone').val(),
                'password'  : $('#password').val()
            }
            Controller.Post('/api/upsert/client', data).done(function(result) {
                console.log(result)
                window.location.reload()
            })
        }

    </script>


@endsection
