{{-- Extends layout --}}

@extends('dashboard.layouts.master')

@section('title', 'Role.Permissions')



{{-- Styles Section --}}

@section('styles')

    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

@endsection





{{-- Content --}}

@section('content')



    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">

                <h3 class="card-label">Role.Permissions View

                </h3>

            </div>



        </div>



        <div class="card-body">
            @php
            $permissionGroup = App\Models\PermissionGroup::all();
        @endphp
            @foreach ($permissionGroup as $item)
            <span class="badge bg-info">{{ $item->name }}</span>
            <table class="table table-bordered table-hover" id="kt_datatable">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>ID</th>

                        <th>Name</th>

                        <th>Guard</th>

                        <th>Status</th>

                    </tr>

                </thead>


                    <tbody>

                        <span hidden>{{ $counter = 0 }}</span>

                        @php
                            $permissions = Spatie\Permission\Models\Permission::where('permission_group_id', $item->id)->get();
                        @endphp
                        @foreach ($permissions as $permission)
                            <tr>

                                <td><span class="badge bg-info">#{{ ++$counter }}</span></td>

                                <td>{{ $permission->id }}</td>

                                <td>{{ $permission->name }}</td>

                                <td>{{ $permission->guard_name }}</td>

                                <td>

                                    <div class="icheck-primary d-inline">

                                        <input type="checkbox" id="permission_{{ $permission->id }}"
                                            onchange="storeRolePermission({{ $roleId }},{{ $permission->id }})"
                                            @if ($permission->active) checked @endif>

                                        <label for="permission_{{ $permission->id }}">

                                        </label>

                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>



            </table>
            @endforeach

        </div>

    </div>

@endsection







{{-- Scripts Section --}}

@section('js')

    {{-- vendors --}}

    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}

    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('crudjs/crud.js') }}"></script>



    <script>
        function storeRolePermission(roleId, permissionId) {

            let data = {

                permission_id: permissionId,

            };



            store('/dashboard/admin/role/' + roleId + '/permissions', data);

        }
    </script>

@endsection
