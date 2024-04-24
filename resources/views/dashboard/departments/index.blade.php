@extends('dashboard.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css-rtl/chartCircle.css') }}" rel="stylesheet" />
@endsection
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 mb-0 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-cou">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li> /
                    <li class="breadcrumb-cou">
                        <a href="{{ route('programs.index') }}"class="text-muted">المشاريع</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right flex-wrap">
            <button class="btn btn-warning btn-md mr-1" data-target="#select2modal" type="button"   data-toggle="modal"> اضافة ادراة فرعية جديدة </button>
            <button class="btn btn-warning btn-md mr-1" data-target="#select2modal" type="button"   data-toggle="modal"> اضافة قطاع جديد </button>
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/css-rtl/drawar-user.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <!--open filter Top  -->
        <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <form method="get">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            {{-- <span class="right-pan"><i class="bi bi-sliders"></i></span> --}}
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <input type="text" class="form-control form-input" name="seacrh_name"
                                            value="" id="seacrh_name" placeholder="بحث">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <button class="btn btn-outline-light btn-print" type="submit"> بحث </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--closed filter Top  -->

        <!-- table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0 text-md-nowrap">
                            <thead>
                                <tr class="tableHead">
                                    {{-- <th><input type="checkbox" class="checkParent"></th> --}}
                                    <th>#</th>
                                    <th > اسم القطاع </th>
                                    <th>   عدد البرامج المرتبطة </th>
                                    <th>   عدد الدورات المرتبطة </th>
                                    <th>  اجمالي المقاعد المرتبطة  </th>
                                    <th>  اسم رئيس القسم  </th>

                                    <td class="col-filter">
                                        <!-- dropdown-menu -->
                                        <button data-toggle="dropdown" class="btn btn-previous p-0"><i
                                                class="bi bi-filter-square tx-20"></i></button>
                                        <div class="dropdown-menu scrollable-menu">
                                        </div>
                                    </td>
                                    <!-- Filter -->
                                </tr>
                            </thead>
                            <tbody id="table-body">

                                <tr class="table-rows">
                                    <td scope="row"> 1 </td>
                                    <td scope="row"> fgfgf </td>
                                    <td scope="row">fdfd </td>
                                    <td scope="row"> gfgf </td>
                                    <td scope="row">hghg </td>
                                    <td class="client-name">fgfgf</td>
                                    <td class="">
                                        <a aria-controls="collapseExample" aria-expanded="false" data-toggle="collapse" href="#collapseExample2" role="button"> <i class="ti-arrow-circle-down fa-2x"></i>  </a>
                                    </td>
                                </tr>
                                {{-- row Tap  --}}
                                <tr class="collapse" id="collapseExample2">
                                    <td colspan="10">
                                        <div class="card">
                                            <div class="card-body">
                                                {{-- row table children --}}
                                                <div class="table-responsive">
                                                    <table class="table text-nowrap">
                                                        <thead class="p-4">
                                                            <tr class="tableHead bg-darck p-3">
                                                                {{-- <th><input type="checkbox" class="checkParent"></th> --}}
                                                                <th class="pt-2 pb-2">#</th>
                                                                <th class="pt-2 pb-2" > الادارات الفرعية </th>
                                                                <th class="pt-2 pb-2"> عدد الدورات </th>
                                                                <th class="pt-2 pb-2"> اجمالي المقاعد </th>
                                                                <th class="pt-2 pb-2"> التصنيف </th>
                                                                <th class="pt-2 pb-2"> المدير المباشر </th>
                                                                <th class="pt-2 pb-2"> اضافة دورة </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-body">


                                                            <tr class="table-rows bg-white">
                                                                <td scope="row"> 1 </td>
                                                                <td scope="row"> fdfdf </td>
                                                                <td scope="row"> gfgf </td>
                                                                <td class="client-name"> gfgf </td>
                                                                <td class="client-name"> gfgf </td>
                                                                <td class="client-name"> gfgfg </td>

                                                                <td class="">
                                                                    <div class="d-flex">
                                                                        <button class="btn btn-warning btn-md mr-1" data-target="#select2modal" type="button"   data-toggle="modal"> اضافة دورة </button>
                                                                    </div>

                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{--end row table children --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{--end row Tap --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="select2modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title"> نموذج اضافة دورة جديدة </h5><button aria-label="Close" class="close"
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
                                {{-- <label class="rdiobox"><input id="interactive" name="rdio" type="radio"> <span>
                                        اختبار تفاعلي </span></label> --}}
                                 <label class="rdiobox"><input id="rate" name="rdio" type="radio"> <span>
                                             تقيم الدوره </span></label>
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
                                <p class="mg-b-10"> المشروع </p>
                                <select class="form-control select2" id="program_id">
                                    <option value="">
                                    </option>

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
@endsection
@section('js')
@endsection


