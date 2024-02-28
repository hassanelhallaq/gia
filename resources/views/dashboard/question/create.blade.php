@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0"
        style="border-top: 1px solid #00000030;">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('quizes.index') }}"class="text-muted"> الأسئلة والأختبارات </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> اضافة اختبار </a>
                    </li>
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
    <div class="container-fluid mt-3">
        <!-- row -->
        <div class="row mb-5">
            <div class="col-lg-10 col-sm-12 m-auto mb-5 pos-relative">
                <form action="" method="post" id="create_form">
                    <div class="card pos-relative">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-8 mb-4">
                                    <label for="example"> السؤال </label>
                                    <input class="form-control" id="name" name="question_name" required=""
                                        type="text">
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <p class="mg-b-10"> نوع السؤال </p>
                                    <select class="form-control select2" name="type" id="type">
                                        <option value="single_choose">
                                            اختيار واحد
                                        </option>
                                        <option value="multi_choose">
                                            اختيار متعدد
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0" name="option" id="option_one"
                                            placeholder=" الأجابة رقم واحد " type="text">
                                        <div class="d-flex justify-content-between w-lg-40 ">
                                            <label class="rdiobox m-auto"><input correct-input name="correct"
                                                    id="correct_one" type="radio">
                                                <span>الأجابة الصحيحة</span></label>
                                            <i class="typcn typcn-edit mr-3 tx-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0" placeholder=" الأجابة رقم اثنين "
                                            id="option_two" name="option" type="text">
                                        <div class="d-flex justify-content-between w-lg-40">
                                            <label class="rdiobox m-auto"><input correct-input name="correct"
                                                    id="correct_two" type="radio">
                                                <span>الأجابة الصحيحة</span></label>
                                            <i class="typcn typcn-edit mr-3 tx-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0" placeholder=" الأجابة رقم ثلاثة "
                                            id="option_three" name="option" type="text">
                                        <div class="d-flex w-lg-40">
                                            <label class="rdiobox m-auto"><input correct-input name="correct"
                                                    id="correct_three" type="radio">
                                                <span>الأجابة الصحيحة</span></label>
                                            <i class="typcn typcn-edit mr-3 tx-20"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0" placeholder=" الأجابة رقم الرابعه "
                                            id="option_four" name="option" type="text">
                                        <div class="d-flex w-lg-40">
                                            <label class="rdiobox m-auto"><input correct-input name="correct"
                                                    id="correct_four" type="radio">
                                                <span>الأجابة الصحيحة</span></label>
                                            <i class="typcn typcn-edit mr-3 tx-20"></i>
                                        </div>
                                    </div>
                                </div>


                            </div>




                        </div>
                    </div>

                    <div class="modal-footer btnSaveTest border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button"
                            onclick="createQuestions({{ $id }})"> حفظ
                            السؤال واضافه سؤال جديد<i class="bi bi-floppy"></i></button>
                         <a class="btn btn-warning-gradient btn-with-icon" href="{{ route('quizes.index') }}"> الانتهاء</a>

                    </div>
                </form>

            </div>
        </div>
        <!-- row closed -->



    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/RepeatTest.js') }}"></script>
    <script>
        function createQuestions(id) {
            let data = {
                name: document.getElementById("name").value,
                type: document.getElementById("type").value,
                option_one: document.getElementById("option_one").value,
                option_two: document.getElementById("option_two").value,
                option_three: document.getElementById("option_three").value,
                correct_one: document.getElementById("correct_one").checked,
                correct_two: document.getElementById("correct_two").checked,
                correct_three: document.getElementById("correct_three").checked,
                option_four: document.getElementById("option_four").value,
                correct_four: document.getElementById("correct_four").checked,
                quiz_id: id,

            };

            store('/dashboard/admin/questions', data);

        }
    </script>
@endsection
