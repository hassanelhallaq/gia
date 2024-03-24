@extends('dashboard.layouts.master')
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">

        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    {{-- <li class="breadcrumb-item">
                        <a href="#"class="text-muted"> الأسئلة والأختبارات </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> اضافة اختبار </a>
                    </li> --}}
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            <div class=" d-flex">
                <a href="main_tests.html" class="btn btn-previous btn-sm text-warning mt-2"><i
                        class="ti-angle-double-right"></i> العودة </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
        <!-- row -->
        <div class="row mb-5">
            <div class="col-lg-10 col-sm-12 m-auto mb-5 pos-relative">
                <form action="" method="post" id="create_form">
                    <div class="card pos-relative">
                        <div class="card-body" >
                            <div class="row " >
                                <div class="col-8 mb-4">
                                    <label for="example"> السؤال </label>
                                    <input class="form-control" id="question" name="question" required=""
                                        type="text">
                                </div>



                            </div>




                        </div>
                    </div>

                    <div class="modal-footer btnSaveTest border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="createQuestions({{$id}})"> حفظ
                            الأسئلة<i class="bi bi-floppy"></i></button>
                    </div>
                </form>

            </div>
        </div>
        <!-- row closed -->



@endsection
@section('js')
    <script src="{{ asset('assets/js/RepeatTest.js') }}"></script>
    <script>
        function createQuestions(id) {
            let data = {
                question: document.getElementById("question").value,

                course_id: id,

            };

            store('/dashboard/admin/rates', data);

        }
    </script>
@endsection
