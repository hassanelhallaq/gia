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
                    <div class="card pos-relative" id="questions">
                        <div class="card-body">
                            <div class="row " question>
                                <div class="col-8 mb-4">
                                    <label for="example"> السؤال </label>
                                    <input class="form-control" id="name" value="{{ $question->name }}"
                                        name="question_name" required="" type="text">
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <p class="mg-b-10"> نوع السؤال </p>
                                    <select class="form-control select2" name="type" id="type">
                                        <option @if ($question->type == 'single_choose') selected @endif value="single_choose">
                                            اختيار واحد
                                        </option>
                                        <option @if ($question->type == 'multi_choose') selected @endif value="multi_choose">
                                            اختيار متعدد
                                        </option>
                                    </select>
                                </div>
                                <div class="row" options>
                                    @foreach ($question->options as $optionKey => $options)
                                        <div class="col-lg-12 mb-4" option>
                                            <input type="text" name="option_id" id="option_id" value="{{$options->id}}"
                                            class="form-control form-control-solid" placeholder="Enter Name" hidden />
                                            <div
                                                class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                                <input class="form-control border-0" value="{{ $options->answer }}"
                                                    name="option" id="option_{{ $options->id }}"
                                                    placeholder=" الأجابة رقم واحد " type="text">
                                                <div class="d-flex justify-content-between w-lg-40 ">
                                                    <label class="rdiobox m-auto"><input correct-input
                                                            name="correct_{{ $optionKey }}"
                                                            id="correct_{{ $options->order }}" value="1"
                                                            @if ($options->is_corect == 1) checked
                                                @elseif($options->is_corect == 0) @endif
                                                            type="radio">
                                                        <span>الأجابة الصحيحة</span></label>
                                                    <i class="typcn typcn-edit mr-3 tx-20"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="col-lg-12 mb-4">
                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5  d-flex justify-content-between">
                                        <input class="form-control border-0" placeholder=" اكتب اجابة هنا " type="text">
                                        <div class=" ">
                                            <button type="button" class="btn btn-previous btn-icon   addinputresult"> أضف
                                                <i class="bi bi-plus tx-24"></i></button>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div
                                    class="btnAddtest card-chart wd-25 ht-25 bg-warning-gradient brround ml-2 mt-1 pos-absolute b-0 l-100">
                                    <i class="bi bi-plus text-white tx-36"></i>
                                </div> --}}

                            </div>




                        </div>
                    </div>

                    <div class="modal-footer btnSaveTest border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button"
                            onclick="createQuestions({{ $question->id }})"> حفظ
                            السؤال <i class="bi bi-floppy"></i></button>

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
            var questions = [];
            var $question = $('.row[question]'); // Assuming this is the container for the question

            $question.find('[options] [option]').each(function() {
                var $option = $(this);
                var option = {
                    option_id: $option.find('[name="option_id"]').val(),
                    option: $option.find('[name="option"]').val(),
                    correct: ($option.find('[correct-input]').prop('checked') ? 1 : 0)
                };
                questions.push(option);
            });

            let formData = new FormData();
            formData.append("_method", "PUT");
            formData.append('name', document.getElementById('name').value);
            formData.append('type', document.getElementById('type').value);
            formData.append('questions', JSON.stringify(questions));

            // Assuming store is a function to send the form data to the server
            storeRoute('/dashboard/admin/questions/' + id, formData);
        }
    </script>
@endsection
