@extends('shared.master')

@section('title')
Settings
@endsection

@section('css')
@endsection

@section('modal')
    <div class="modal fade" id="modal-roles">
        <div class="modal-dialog">
            <div class="modal-content card bg-secondary shadow">
                <div class="modal-header card-header bg-white border-0">
                    <h4 class="card-title">Account Role Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input id="role_id" type="hidden" value="-1">
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input id="role" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" data-dismiss="modal" onclick="SaveRole()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-sidebar-items">
        <div class="modal-dialog">
            <div class="modal-content card bg-secondary shadow">
                <div class="modal-header card-header bg-white border-0">
                    <h4 class="card-title">Sidebar Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input id="sidebar_item_id" type="hidden" value="-1">
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input id="title" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Element ID</label>
                                <input id="element_id" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Link</label>
                                <input id="link" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Icon</label>
                                <input id="icon" type="text" class="form-control form-control-alternative">
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
    <div class="modal fade" id="modal-sidebar-role-access">
        <div class="modal-dialog">
            <div class="modal-content card bg-secondary shadow">
                <div class="modal-header card-header bg-white border-0">
                    <h4 class="card-title">Sidebar Role Access</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input id="sidebar_role_access_id" type="hidden" value="-1">
                <div class="modal-body card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="account_role_id" class="form-control-label">Account Role</label>
                                <select id="account_role_id" data-style="bg-white shadow-sm" class="form-control form-control-alternative  selectpicker">
                                    <option selected disabled>Please Select</option>
                                    @foreach ($roles->data as $item)
                                        <option value="{{ $item->id }}">{{ $item->role }}</option>
                                    @endforeach
                                </select>
                                <!-- <input id="state" type="text" class="form-control form-control-alternative "> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="sidebar_id" class="form-control-label">Sidebar Item</label>
                                <select id="sidebar_id" data-style="bg-white shadow-sm" class="form-control form-control-alternative  selectpicker">
                                    <option selected disabled>Please Select</option>
                                    @foreach ($sidebar_items->data as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                <!-- <input id="state" type="text" class="form-control form-control-alternative "> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" data-dismiss="modal" onclick="SaveRoleAccess()">Save</button>
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
                        <h6 class="h2 text-white d-inline-block mb-0">Settings</h6>
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
                                <strong>Account Roles</strong>
                                <button class="btn btn-sm btn-primary float-right" type="button" onclick="AddNewRole()">Add New Role</button>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Role ID</th>
                                <th scope="col">Label</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($roles->data as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->role }}</td>
                                    <td>
                                        <a type="button" class="mr-1 text-light" onclick="EditRole({{ json_encode($item) }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a type="button" class="mr-1 text-light" onclick="DeleteRole({{ json_encode($item) }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer border-1">
                        <h5 class="d-inline float-left">Total: {{ $roles->total }}</h5>
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
                                <strong>Sidebar Items</strong> <span class="text-muted small">(Item links in the sidebar):</span>
                                <button class="btn btn-sm btn-primary float-right" type="button" onclick="AddNewItem()">Add New Item</button>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Item ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Element ID</th>
                                <th scope="col">Link</th>
                                <th scope="col">Icon</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($sidebar_items->data as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->element_id }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td>{{ $item->icon }}</td>
                                    <td>
                                        <a type="button" class="mr-1 text-light" onclick="EditItem({{ json_encode($item) }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a type="button" class="mr-1 text-light" onclick="DeleteItem({{ json_encode($item) }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer border-1">
                        <h5 class="d-inline float-left">Total: {{ $sidebar_items->total }}</h5>
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
                                <strong>Sidebar Role Access</strong> <span class="text-muted small">(Allow access to sidebar links on specific roles):</span>
                                <button class="btn btn-sm btn-primary float-right" type="button" onclick="AddNewRoleAccess()">Add New Role Access</button>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Access ID</th>
                                <th scope="col">Role ID</th>
                                <th scope="col">Sidebar ID</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($sidebar_role_access->data as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->role_id }}</td>
                                    <td>{{ $item->sidebar_id }}</td>
                                    <td>
                                        <a type="button" class="mr-1 text-light" onclick="EditRoleAccess({{ json_encode($item) }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a type="button" class="mr-1 text-light" onclick="DeleteRoleAccess({{ json_encode($item) }})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer border-1">
                        <h5 class="d-inline float-left">Total: {{ $sidebar_role_access->total }}</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')

    <script>

        setSideBar('#menu-settings');

        var modal_roles                 = '#modal-roles'
        var modal_sidebar_items         = '#modal-sidebar-items'
        var modal_sidebar_role_access   = '#modal-sidebar-role-access'

        function AddNewRole() {

            $('#role_id').val('-1')
            $('#role').val('')

            $(modal_roles).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function EditRole(e) {

            console.log(e)

            $('#role_id').val(e.id)
            $('#role').val(e.role)

            $(modal_roles).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function DeleteRole(e) {
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
                        Controller.Post('/api/delete/role', data).done(function(result) {
                            console.log(result)
                            window.location.reload()
                        })
                    }
                }
            });

        }

        function SaveRole() {
            data = {
                'id'    : $('#role_id').val(),
                'role'  : $('#role').val(),
            }
            Controller.Post('/api/upsert/role', data).done(function(result) {
                console.log(result)
                window.location.reload()
            })
        }

        //

        function AddNewItem() {

            $('#sidebar_item_id').val('-1')
            $('#title').val('')
            $('#element_id').val('')
            $('#link').val('')
            $('#icon').val('')

            $(modal_sidebar_items).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function EditItem(e) {

            console.log(e)

            $('#sidebar_item_id').val(e.id)
            $('#title').val(e.title)
            $('#element_id').val(e.element_id)
            $('#link').val(e.link)
            $('#icon').val(e.icon)

            $(modal_sidebar_items).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function DeleteItem(e) {
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
                        Controller.Post('/api/delete/sidebar_item', data).done(function(result) {
                            console.log(result)
                            window.location.reload()
                        })
                    }
                }
            });

        }

        function SaveItem() {
            data = {
                'id'                : $('#sidebar_item_id').val(),
                'title'             : $('#title').val(),
                'element_id'        : $('#element_id').val(),
                'link'              : $('#link').val(),
                'icon'              : $('#icon').val()
            }
            Controller.Post('/api/upsert/sidebar_item', data).done(function(result) {
                console.log(result)
                window.location.reload()
            })
        }

        //

        function AddNewRoleAccess() {

            $('#sidebar_role_access_id').val('-1')
            $('#account_role_id').val('')
            $('#sidebar_id').val('')

            $(modal_sidebar_role_access).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function EditRoleAccess(e) {

            console.log(e)

            $('#sidebar_role_access_id').val(e.id)
            $('#account_role_id').val(e.role_id)
            $('#sidebar_id').val(e.sidebar_id)

            $(modal_sidebar_role_access).modal({
                "backdrop"  : "static",
                "keyboard"  : true,
                "show"      : true
            })

        }

        function DeleteRoleAccess(e) {
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
                        Controller.Post('/api/delete/sidebar_role_access', data).done(function(result) {
                            console.log(result)
                            window.location.reload()
                        })
                    }
                }
            });

        }

        function SaveRoleAccess() {
            data = {
                'id'                : $('#sidebar_role_access_id').val(),
                'role_id'           : $('#account_role_id').val(),
                'sidebar_id'        : $('#sidebar_id').val(),
            }
            console.log(data);
            Controller.Post('/api/upsert/sidebar_role_access', data).done(function(result) {
                console.log(result)
                window.location.reload()
            })
        }

    </script>


@endsection
