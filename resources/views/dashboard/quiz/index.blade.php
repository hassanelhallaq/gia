@extends('dashboard.layouts.master')
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
    <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="table_program_management.html"class="text-muted">البرامج</a>
                    </li>
                    {{-- <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> برنامج تطوير المهارات الشخصية </a>
                </li> --}}
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            <div class=" d-flex">
                {{-- <a href="add_tests.html" class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> اضافة اسئلة <i class="bi bi-plus"></i></a> --}}
                <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1" data-target="#select2modal"
                    data-toggle="modal"> اضافة اختبار جديد <i class="bi bi-plus"></i></button>
            </div>
        </div>
    </div>
@endsection
@section('content')
        <!-- row -->
        <div class="row table-tabs">
            <!--open filter and Tap <Top>  -->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="row card-body  p-3">
                        <div class="col-lg-6 col-sm-12 tab-menu-heading mb-3">
                            <div class="tabs-menu">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs mt-2 mt-sm-6">
                                    <li class="ml-3"><a href="#tab11" class="active" data-toggle="tab"> الأختبار القبلي
                                        </a></li>
                                    <li class="ml-3"><a href="#tab12" data-toggle="tab"> الأختبار البعدي </a></li>
                                    <li class="ml-3"><a href="#tab13" data-toggle="tab"> الأختبار التفاعلي </a></li>
                                    <li class="ml-3"><a href="#tab131" data-toggle="tab"> تقييم المشارك</a></li>

                                </ul>
                            </div>
                        </div>
                        <!--input Search -->

                    </div>
                </div>
            </div>
            <!--closed filter Top  -->

            <!-- table -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane active table-container" id="tab11">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                <th class="tx-15">
                                                    اسم الأختبار
                                                </th>
                                                <th class="tx-5">عدد الدورات المرتبطة </th>
                                                {{-- <th> نوع السؤال </th> --}}
                                                {{-- <th>عدد التسجيلات</th>
                                                <th>حالات مقدمة</th>
                                                <th>حالات لم تقدم</th>
                                                <th>الاكتمال</th> --}}

                                                <th></th>
                                            </tr>
                                        </thead>
                                        @foreach ($quizesBefor as $index => $item)
                                            <tbody class="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td><input type="checkbox" class="checkChild"></td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td scope="row"> {{ $item->name }} </td>
                                                    <td>{{$item->courses_count}} دورات</td>
                                                    {{-- <td> اختبار قبلي </td> --}}
                                                    {{-- <td>12</td>
                                                    <td>50</td>
                                                    <td>40</td>
                                                    <td>90%</td> --}}
                                                    <td class="d-flex filter-col-cell">
                                                         <a href="{{route('quizes.show',[$item->id])}}"><i class="far fa-eye tx-14"></i></a>                                                        <!-- dropdown-menu -->

                                                        <!-- dropdown-menu -->
                                                        <button data-toggle="dropdown"
                                                            class="btn btn-previous btn-sm btn-block"><i
                                                                class="si si-options-vertical text-gray tx-13"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" class="dropdown-item" data-target="#modaledit_{{$item->id}}"
                                                                data-toggle="modal"> تحرير </a>
                                                                <a href="{{route('duplicate.quiz',[$item->id])}}" class="dropdown-item"
                                                                > نسخ </a>
                                                            {{-- <a href="questions_and_tests_management.html"
                                                                class="dropdown-item"> عرض </a> --}}
                                                                <button class="dropdown-item"data-target="#modalDelete"
                                                                onclick="performDestroy({{ $item->id }} , this)"> حذف
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane table-container" id="tab12">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                <th class="tx-15">
                                                    اسم الأختبار
                                                </th>
                                                <th class="tx-5">عدد الدورات المرتبطة </th>
                                                {{-- <th> نوع السؤال </th>
                                                <th>عدد التسجيلات</th>
                                                <th>حالات مقدمة</th>
                                                <th>حالات لم تقدم</th>
                                                <th>الاكتمال</th> --}}
                                                <th>

                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        @foreach ($quizesAfter as $index => $item)
                                            <tbody class="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td><input type="checkbox" class="checkChild"></td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td scope="row"> {{ $item->name }} </td>
                                                    <td>{{$item->courses_count}} دورات</td>
                                                    {{-- <td> اختبار بعدي </td> --}}
                                                    {{-- <td>12</td>
                                                    <td>50</td>
                                                    <td>40</td>
                                                    <td>90%</td> --}}
                                                    <td class="d-flex filter-col-cell">
                                                        <!-- dropdown-menu -->
                                                        <a href="{{route('quizes.show',[$item->id])}}"><i class="far fa-eye tx-14"></i></a>                                                        <!-- dropdown-menu -->

                                                        <button data-toggle="dropdown"
                                                            class="btn btn-previous btn-sm btn-block"><i
                                                                class="si si-options-vertical text-gray tx-13"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" class="dropdown-item" data-target="#modaledit_{{$item->id}}"
                                                                data-toggle="modal"> تحرير </a>
                                                            {{-- <a href="questions_and_tests_management.html"
                                                                class="dropdown-item"> عرض </a> --}}
                                                                <button class="dropdown-item"data-target="#modalDelete"
                                                                onclick="performDestroy({{ $item->id }} , this)"> حذف
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane table-container" id="tab13">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                <th class="tx-15">
                                                    اسم الأختبار
                                                </th>
                                                <th class="tx-5">عدد الدورات المرتبطة </th>
                                                {{-- <th> نوع السؤال </th>
                                                <th>عدد التسجيلات</th>
                                                <th>حالات مقدمة</th>
                                                <th>حالات لم تقدم</th>
                                                <th>الاكتمال</th> --}}
                                                <th>

                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        @foreach ($quizesInteractive as $index => $item)
                                            <tbody class="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td><input type="checkbox" class="checkChild"></td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td scope="row"> {{ $item->name }} </td>
                                                    <td>{{$item->courses_count}} دورات</td>                                                    <td> اختبار تفاعلي </td>
                                                    {{-- <td>12</td>
                                                    <td>50</td>
                                                    <td>40</td>
                                                    <td>90%</td> --}}
                                                    <td class="d-flex filter-col-cell">
                                                        <a href="{{route('quizes.show',[$item->id])}}"><i class="far fa-eye tx-14"></i></a>                                                        <!-- dropdown-menu -->
                                                        <!-- dropdown-menu -->
                                                        <button data-toggle="dropdown"
                                                            class="btn btn-previous btn-sm btn-block"><i
                                                                class="si si-options-vertical text-gray tx-13"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" class="dropdown-item" data-target="#modaledit_{{$item->id}}"
                                                                data-toggle="modal"> تحرير </a>
                                                            {{-- <a href="questions_and_tests_management.html"
                                                                class="dropdown-item"> عرض </a> --}}
                                                            <button class="dropdown-item"data-target="#modalDelete"
                                                                onclick="performDestroy({{ $item->id }} , this)"> حذف
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane  table-container" id="tab131">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                <th class="tx-15">
                                                    اسم الأختبار
                                                </th>
                                                <th class="tx-5">عدد الدورات المرتبطة </th>
                                                {{-- <th> نوع السؤال </th> --}}
                                                {{-- <th>عدد التسجيلات</th>
                                                <th>حالات مقدمة</th>
                                                <th>حالات لم تقدم</th>
                                                <th>الاكتمال</th> --}}

                                                <th></th>
                                            </tr>
                                        </thead>
                                        @foreach ($rates as $index => $item)
                                            <tbody class="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td><input type="checkbox" class="checkChild"></td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td scope="row"> {{ $item->name }} </td>
                                                    <td>{{$item->courses_count}} دورات</td>
                                                    {{-- <td> اختبار قبلي </td> --}}
                                                    {{-- <td>12</td>
                                                    <td>50</td>
                                                    <td>40</td>
                                                    <td>90%</td> --}}
                                                    <td class="d-flex filter-col-cell">
                                                         <a href="{{route('quizes.show',[$item->id])}}"><i class="far fa-eye tx-14"></i></a>                                                        <!-- dropdown-menu -->
                                                        <!-- dropdown-menu -->
                                                        <button data-toggle="dropdown"
                                                            class="btn btn-previous btn-sm btn-block"><i
                                                                class="si si-options-vertical text-gray tx-13"></i></button>
                                                        <div class="dropdown-menu">

                                                                <button class="dropdown-item"data-target="#modalDelete"
                                                                onclick="performDestroy({{ $item->id }} , this)"> حذف
                                                            </button>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->


            <!--open filter bottom  -->
            <div class="col-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex p-3">
                        <ul class="pagination mb-0">

                        </ul>

                    </div>
                </div>
            </div>
            <!--closed filter bottom  -->
        </div>
        <!-- row closed -->
    <div class="modal" id="select2modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة اختبار جديد</h5><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row mg-t-10">
                            <div class="col  d-flex justify-content-between flex-wrap">
                                <label class="rdiobox"><input selected name="rdio" id="befor" type="radio"> <span>
                                        اختبار قبلي </span></label>
                                <label class="rdiobox"><input checked="" id="after" name="rdio"
                                        type="radio"> <span> اختبار بعدي </span></label>
                                <label class="rdiobox"><input id="interactive" name="rdio" type="radio"> <span>
                                        اختبار تفاعلي </span></label>
                                 <label class="rdiobox"><input id="rate" name="rate" type="radio"> <span>
                                             تقيم المشاركين </span></label>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> اسم الأختبار </label>
                                <input class="form-control" required="" id="name" type="text">
                            </div>

                            <div class="col-12 mt-4">
                                <label for="example"> طريقه التقديم</label>
                                <select class="form-control select2" id="how_attend">

                                    <option value="questions">
                                        questions
                                    </option>
                                    <option value="link">
                                        link
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> الرابط</label>
                                <input class="form-control"  id="link" type="text">
                            </div>
                            <div class="col-12 mt-4">
                                <p class="mg-b-10"> البرنامج </p>
                                <select class="form-control select2" id="program_id">
                                    <option value="">
                                    </option>
                                    @foreach ($programs as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <p class="mg-b-10"> الدوره </p>
                                <select class="form-control select2" id="course_id">
                                    <!-- Cities will be populated dynamically using JavaScript -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performStore()">
                            حفظ <i class="bi bi-floppy"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($quizes as $quiz)
    <div class="modal" id="modaledit_{{$quiz->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة اختبار جديد</h5><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row mg-t-10">
                            <div class="col  d-flex justify-content-between flex-wrap">
                                <label class="rdiobox"><input @if($quiz->type == 'befor') checked @endif name="rdio" id="befor_{{$quiz->id}}" type="radio"> <span>
                                        اختبار قبلي </span></label>
                                <label class="rdiobox"><input @if($quiz->type == 'after') checked @endif  id="after_{{$quiz->id}}" name="rdio"
                                        type="radio"> <span> اختبار بعدي </span></label>
                                <label class="rdiobox"><input id="interactive_{{$quiz->id}}" @if($quiz->type == 'interactive') checked @endif  name="rdio" type="radio"> <span>
                                        اختبار تفاعلي </span></label>
                                 <label class="rdiobox"><input id="rate_{{$quiz->id}}" @if($quiz->type == 'rate') checked @endif name="rdio" type="radio"> <span>
                                             تقيم المشاركين </span></label>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> اسم الأختبار </label>
                                <input class="form-control" required="" value="{{$quiz->name}}" id="name_{{$quiz->id}}" type="text">
                            </div>

                            <div class="col-12 mt-4">
                                <label for="example"> طريقه التقديم</label>
                                <select class="form-control select2" id="how_attend_{{$quiz->id}}">

                                    <option @if ($quiz->how_attend == 'questions') selected @endif

                                     value="questions">
                                        questions
                                    </option>
                                    <option @if ($quiz->how_attend == 'link') selected @endif value="link">
                                        link
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> الرابط</label>
                                <input class="form-control"  id="link_{{$quiz->id}}" value="{{$quiz->link}}" type="text">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performUpdate({{$quiz->id}})">
                            حفظ <i class="bi bi-floppy"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@section('js')
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('course_id', document.getElementById('course_id').value);
            formData.append('befor', document.getElementById('befor').checked);
            formData.append('after', document.getElementById('after').checked);
            formData.append('interactive', document.getElementById('interactive').checked);
            formData.append('rate', document.getElementById('rate').checked);
            formData.append('link', document.getElementById('link').value);
            formData.append('how_attend', document.getElementById('how_attend').value);
            storeRoute('/dashboard/admin/quizes', formData)
        }
        function performUpdate(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', document.getElementById('name_'+id).value);
             formData.append('befor', document.getElementById('befor_'+id).checked);
            formData.append('after', document.getElementById('after_'+id).checked);
            formData.append('interactive', document.getElementById('interactive_'+id).checked);
            formData.append('rate', document.getElementById('rate_'+id).checked);
            formData.append('link', document.getElementById('link_'+id).value);
            formData.append('how_attend', document.getElementById('how_attend_'+id).value);
            storeRoute('/dashboard/admin/quizes/' + id, formData)
        }

        $(document).ready(function() {
            // Triggered when the country selection changes
            $('#program_id').change(function() {
                // Get the selected country ID
                var programId = $(this).val();

                // Make an Ajax request to get cities for the selected country
                $.ajax({
                    url: '/dashboard/admin/get-courses/' +
                    programId, // Replace with the actual endpoint on your server
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options in the city dropdown
                        $('#course_id').empty();

                        // Populate the city dropdown with the received data
                        $.each(data, function(key, value) {
                            $('#course_id').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities: ' + error);
                    }
                });
            });
        });
    </script>

<script>
    $(document).ready(function () {
        // Initially hide the link input
        $('#link').hide();

        // On change event for the how_attend select element
        $('#how_attend').change(function () {
            // If the selected option is 'questions', hide the link input
            if ($(this).val() === 'questions') {
                $('#link').hide();
            } else {
                // If the selected option is 'link', show the link input
                $('#link').show();
            }
        });
    });

    $(document).ready(function () {
        // Initially hide the link input
        $('#link').hide();

        // On change event for the how_attend select element
        $('#how_attend').change(function () {
            // If the selected option is 'questions', hide the link input
            if ($(this).val() === 'questions') {
                $('#link').hide();
            } else {
                // If the selected option is 'link', show the link input
                $('#link').show();
            }
        });
    });
</script>

    <script>
        function performDestroy(id, reference) {

            let url = '/dashboard/admin/quizes/' + id;

            confirmDestroy(url, reference);
        }
    </script>

<script>
    // Function to handle radio button change
    function handleRadioChange() {
        // Get the selected radio button
        var selectedRadio = document.querySelector('input[name="rate"]:checked');

        // Hide all fields initially
        document.querySelectorAll('.modal-body .row .col').forEach(function(element) {
            element.style.display = 'none';
        });

        // Show fields if "rate" radio button is selected
        if (selectedRadio && selectedRadio.id === 'rate') {
            document.getElementById('rate').parentNode.parentNode.style.display = 'block';
        }
    }

    // Add event listeners for radio button change
    document.querySelectorAll('input[name="rate"]').forEach(function(radio) {
        radio.addEventListener('change', handleRadioChange);
    });

    // Initially call handleRadioChange to set the initial state
    handleRadioChange();
</script>

@endsection
