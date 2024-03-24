@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 mb-0 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('programs.index') }}" class="text-muted">البرامج</a>

                </ol>
            </nav>
        </div>
        <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1" data-target="#model_add_template" data-toggle="modal"> اضافة قالب
            جديد <i class="bi bi-plus"></i></button>


    </div>
@endsection
@section('css')
    <style>
        .scrollable-menu {
            height: auto;
            max-height: 100%;
            overflow-x: hidden;
        }
    </style>
@endsection
@section('content')
    <!-- row -->

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
                                <li class="ml-3"><a href="#tab11" class="active" data-toggle="tab"> قوالب الرسائل النصية
                                </a></li>
                                <li class="ml-3"><a href="#tab12" data-toggle="tab"> قوالب رسائل البريد الإلكتروني
                                </a>
                                </li>
                                <li class="ml-3"><a href="#tab13" data-toggle="tab"> الأوامر التفاعلية  </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--input Search -->
                    <div class="col-lg-6 col-sm-6 form  d-flex justify-content-between">
                        <div class="pos-relative w-60">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input search-table"
                                placeholder="بحث">
                            <span class="right-pan"><i class="bi bi-sliders"></i></span>
                        </div>
                    </div>
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
                            <button class="btn btn-warning-gradient btn-with-icon btn-md mb-5" data-target="#model_add_sms" data-toggle="modal"> اضافة  قالب <i class="bi bi-plus"></i></button>
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr class="tableHead">
                                            <th><input type="checkbox" class="checkParent"></th>
                                            <th>#</th>
                                            <th class="tx-15">
                                                اسم الأختبار
                                            </th>
                                            <th class="tx-5">عدد الدورات المرتبطة </th>
                                            <th> نوع السؤال </th>
                                            <th>عدد التسجيلات</th>
                                            <th>حالات مقدمة</th>
                                            <th>حالات لم تقدم</th>
                                            <th>الاكتمال</th>
                                            <td class="col-filter">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown"
                                                    class="btn btn-previous p-0"><i
                                                        class="bi bi-filter-square tx-20"></i></button>
                                                <div class="dropdown-menu">
                                                </div>
                                            </td>

                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                        </tr>
                                        <tr class="table-rows">
                                            <td><input type="checkbox" class="checkChild"></td>
                                            <td>1</td>
                                            <td scope="row"> مادة </td>
                                            <td>6 دورات</td>
                                            <td> اختبار قبلي </td>
                                            <td>12</td>
                                            <td>50</td>
                                            <td>40</td>
                                            <td>90%</td>
                                            <td class="d-flex filter-col-cell">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown"
                                                    class="btn btn-previous btn-sm btn-block"><i
                                                        class="si si-options-vertical text-gray tx-13"></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"
                                                        data-target="#modaledit" data-toggle="modal"> تحرير
                                                    </a>
                                                    <a href="test_setting.html" class="dropdown-item"> اعدادات الاختبار</a>
                                                    <a href="questions_and_tests_management.html"
                                                        class="dropdown-item"> عرض </a>
                                                    <a href="#" class="dropdown-item text-danger"
                                                        data-target="#modalDelete" data-toggle="modal"> حذف
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane table-container" id="tab12">
                            <button class="btn btn-warning-gradient btn-with-icon btn-md mb-5" data-target="#model_add_email" data-toggle="modal"> اضافة  قالب <i class="bi bi-plus"></i></button>
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr class="tableHead">
                                            <th><input type="checkbox" class="checkParent"></th>
                                            <th>#</th>
                                            <th class="tx-15">
                                                اسم الأختبار
                                            </th>
                                            <th class="tx-5">عدد الدورات المرتبطة </th>
                                            <th> نوع السؤال </th>
                                            <th>عدد التسجيلات</th>
                                            <th>حالات مقدمة</th>
                                            <th>حالات لم تقدم</th>
                                            <th>الاكتمال</th>
                                            <td class="col-filter">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown"
                                                    class="btn btn-previous p-0"><i
                                                        class="bi bi-filter-square tx-20"></i></button>
                                                <div class="dropdown-menu">
                                                </div>
                                            </td>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                        </tr>
                                        <tr class="table-rows">
                                            <td><input type="checkbox" class="checkChild"></td>
                                            <td>1</td>
                                            <td scope="row"> مادة </td>
                                            <td>6 دورات</td>
                                            <td> اختبار بعدي </td>
                                            <td>12</td>
                                            <td>50</td>
                                            <td>40</td>
                                            <td>90%</td>
                                            <td class="d-flex filter-col-cell">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown"
                                                    class="btn btn-previous btn-sm btn-block"><i
                                                        class="si si-options-vertical text-gray tx-13"></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"
                                                        data-target="#modaledit" data-toggle="modal"> تحرير
                                                    </a>
                                                                                                                    <a href="test_setting.html" class="dropdown-item"> اعدادات الاختبار</a>

                                                    <a href="questions_and_tests_management.html"
                                                        class="dropdown-item"> عرض </a>
                                                    <a href="#" class="dropdown-item text-danger"
                                                        data-target="#modalDelete" data-toggle="modal"> حذف
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane table-container" id="tab13">
                            <button class="btn btn-warning-gradient btn-with-icon btn-md mb-5" data-target="#model_add_InteractiveCommands" data-toggle="modal"> اضافة  قالب الأوامر التفاعلية<i class="bi bi-plus"></i></button>

                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr class="tableHead">
                                            <th><input type="checkbox" class="checkParent"></th>
                                            <th>#</th>
                                            <th class="tx-15">
                                                اسم الأختبار
                                            </th>
                                            <th class="tx-5">عدد الدورات المرتبطة </th>
                                            <th> نوع السؤال </th>
                                            <th>عدد التسجيلات</th>
                                            <th>حالات مقدمة</th>
                                            <th>حالات لم تقدم</th>
                                            <th>الاكتمال</th>
                                            <td class="col-filter">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown"
                                                    class="btn btn-previous p-0"><i
                                                        class="bi bi-filter-square tx-20"></i></button>
                                                <div class="dropdown-menu">
                                                </div>
                                            </td>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none empty-message"> لايوجد </p>
                                        </tr>
                                        <tr class="table-rows">
                                            <td><input type="checkbox" class="checkChild"></td>
                                            <td>1</td>
                                            <td scope="row"> مادة </td>
                                            <td>6 دورات</td>
                                            <td> اختبار تفاعلي </td>
                                            <td>12</td>
                                            <td>50</td>
                                            <td>40</td>
                                            <td>90%</td>
                                            <td class="d-flex filter-col-cell">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown"
                                                    class="btn btn-previous btn-sm btn-block"><i
                                                        class="si si-options-vertical text-gray tx-13"></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"
                                                        data-target="#modaledit" data-toggle="modal"> تحرير
                                                    </a>
                                                    <a href="questions_and_tests_management.html"
                                                        class="dropdown-item"> عرض </a>
                                                    <a href="#" class="dropdown-item text-danger"
                                                        data-target="#modalDelete" data-toggle="modal"> حذف
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- table -->

        @include('dashboard.AddTemplate.model_add_email')
        @include('dashboard.AddTemplate.model_add_InteractiveCommands')
        @include('dashboard.AddTemplate.model_add_template')
        @include('dashboard.AddTemplate.model_add_sms')
    </div>
    <!-- row closed -->
    <!-- row closed -->
@endsection
@section('js')
    <script src="{{ asset('assets/js/xlsx.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/table.js') }}"></script>

    <script>

        function performDestroy(id, reference) {

            let url = '/dashboard/admin/courses/' + id;

            confirmDestroy(url, reference);
        }



    </script>
    		<script src="{{asset('assets/js/table.js')}}"></script>
            <script src="{{asset('assets/js/custom.js')}}"></script>
            <script src="{{asset('assets/js/index.js')}}"></script>

@endsection
