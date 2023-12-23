@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid mt-3">
        <!-- row -->
        <div class="row">
            <div class="col-lg-10 col-sm-12 m-auto">
                <form action="" method="post">
                    <div class="card pos-relative">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-8 mb-4">
                                    <label for="example"> الاسم </label>
                                    <input class="form-control" required="" id="name" type="text">
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <p class="mg-b-10"> الصلاحيات </p>
                                    <select class="form-control select2" id="role_id">
                                        <option value="">

                                        </option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10"> البريد الالكتروني </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="email"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10"> رقم الهاتف </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="phone"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10">كلمه المرور </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="password"
                                            type="password">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10"> المهنه</p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="job"
                                            type="text">
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performStore()"> حفظ <i
                                class="bi bi-floppy"></i></button>
                    </div>
                </form>

            </div>
        </div>
        <!-- row closed -->



    </div>
@endsection
@section('js')
<script>



    function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('phone', document.getElementById('phone').value);
             formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('role_id', document.getElementById('role_id').value);
            formData.append('job', document.getElementById('job').value);
            storeRoute('/dashboard/admin/admins', formData)
        }
</script>
@endsection
