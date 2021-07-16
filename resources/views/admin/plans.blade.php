@extends('shared.master')
@section('title')
Plans
@endsection

@section('css')@endsection

@section('modal')
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content card bg-secondary shadow">
                <div class="modal-header card-header bg-white border-0">
                    <h4 class="card-title">Plan Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input id="id" type="hidden" value="-1">
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Label</label>
                                <input id="label" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <textarea id="description" class="form-control form-control-alternative" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Price</label>
                                <input id="price" type="number" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" data-dismiss="modal" onclick="SavePlan()">Save</button>
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
                        <h6 class="h2 text-white d-inline-block mb-0">Plans</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-1">
                        <div class="row">
                            <div class="col">
                                <strong>Plans</strong>
                                <button class="btn btn-sm btn-primary float-right" type="button" onclick="AddNewPlan()">Add New Plan</button>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Label</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                {{-- <th scope="col">Status</th> --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($plans->data as $data)
                                <tr>
                                    <th scope="row">{{ $data->label }}</th>
                                    <td>{{ Str::limit($data->description, 20, $end='...') }}</td>
                                    <td>{{ $data->price }}</td>
                                    {{-- <td>{{ $data->status }}</td> --}}
                                    <td>
                                        <a type="button" class="mr-1 text-light" onclick="EditPlan({{ json_encode($data) }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a type="button" class="mr-1 text-light" onclick="DeletePlan({{ json_encode($data) }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer border-1">
                        <h5 class="d-inline float-left">Total: {{ $plans->from == $plans->total ? $plans->from : $plans->from . ' - ' . $plans->to }} of {{ $plans->total }}</h5>
                        <nav>
                            <ul class="pagination pagination-sm justify-content-end">
                                @foreach ($plans->links as $link)
                                    @if($loop->first)
                                        <li class="page-item {{ $plans->prev_page_url == null ? 'disabled' : '' }}">
                                            <a class="page-link" href="/admin/plans?page={{ $plans->current_page - 1 }}">
                                                <i class="fa fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                    @elseif($loop->last)
                                        <li class="page-item {{ $plans->next_page_url == null ? 'disabled' : '' }}">
                                            <a class="page-link" href="/admin/plans?page={{ $plans->current_page + 1 }}">
                                                <i class="fa fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="page-item {{ $plans->current_page == $link->label ? 'active' : '' }}"><a class="page-link" href="/admin/plans?page={{ $link->label }}">{{ $link->label }}</a></li>
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

    setSideBar('#menu-plans')

    var modal = "#modal-default"

    function AddNewPlan() {

        $('#id').val('-1')
        $('#label').val('')
        $('#description').val('')
        $('#price').val('')

        $(modal).modal({
            "backdrop"  : "static",
            "keyboard"  : true,
            "show"      : true
        })

    }

    function EditPlan(e) {

        $('#id').val(e.id)
        $('#label').val(e.label)
        $('#description').val(e.description)
        $('#price').val(e.price)

        $(modal).modal({
            "backdrop"  : "static",
            "keyboard"  : true,
            "show"      : true
        })

    }

    function DeletePlan(e) {
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
                        'id' : e.id,
                    }
                    Controller.Post('/api/delete/plan', data).done(function(result) {
                        console.log(result)
                        window.location.reload()
                    })
                }
            }
        });

    }

    function SavePlan() {

        data = {
            'id'            : $('#id').val(),
            'label'         : $('#label').val(),
            'description'   : $('#description').val(),
            'price'         : $('#price').val(),
        }

        Controller.Post('/api/upsert/plan', data).done(function(result) {
            console.log(result)
            window.location.reload()
        })

    }

</script>
@endsection
