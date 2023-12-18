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

                                    <input class="form-control" id="name" required="" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performStore()"> حفظ <i class="bi bi-floppy"></i></button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            storeRoute('/dashboard/admin/categories', formData)
        }
    </script>
    @endsection
