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
                    </li>
                    <li class="breadcrumb-cou">
                        <a href="{{ route('programs.index') }}"class="text-muted">البرامج</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right flex-wrap">
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
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr class="tableHead">
                                    {{-- <th><input type="checkbox" class="checkParent"></th> --}}
                                    <th>#</th>
                                    <th > اسم الدوره </th>
                                    <th>  تاريخ الاعتقاد </th>
                                    <th>  نوع الدورة </th>
                                    <th> عدد المقاعد  </th>
                                    <th>  المقاعد المسجلة </th>
                                    <th>  المقاعد المتاحة</th>
                                    <th>  مقاعد الاستثناء  </th>
                                    {{-- <th>  اضافه للدوره </th> --}}
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
                                @foreach ($course as $i => $cou)
                                <tr class="table-rows">
                                    <td scope="row"> {{$i + 1}} </td>
                                    <td scope="row"> {{$cou->name}} </td>
                                    <td scope="row">{{$cou->start}} </td>
                                    <td scope="row">{{$cou->category->name ?? ''}} </td>
                                    <td scope="row">{{{$cou->seat_count}}} </td>
                                    <td class="client-name"> k0</td>
                                    <td class="client-name"> k0 </td>
                                    <td class="client-name"> k0 </td>
                                    <td class="d-flex w-200"  width="200" >
                                        <a aria-controls="collapseExample" aria-expanded="false" data-toggle="collapse" href="#collapseExample2" role="button"> <i class="ti-arrow-circle-down fa-2x"></i>  </a>
                                        <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1" data-target="#model_add_candidat2" data-toggle="modal">  اضافة مشترك <i class="bi bi-plus"></i></button>
                                        @include('dashboard.candidat.model_add_candidat2')
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
                                                                <th class="pt-2 pb-2" >  اسم المشترك </th>
                                                                <th class="pt-2 pb-2"> رقم الهاتف</th>
                                                                <th class="pt-2 pb-2"> البريد الإلكتروني</th>
                                                                <th class="pt-2 pb-2"> المسمى الوظيفي</th>
                                                                <th class="pt-2 pb-2"> أسم القسم</th>
                                                                <th class="pt-2 pb-2"> القسم الفرعي</th>
                                                                <th class="pt-2 pb-2">  القبول او الرفض </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-body">
                                                            @foreach ($cou->candidatAttend as $candidat)

                                                            <tr class="table-rows bg-white">
                                                                <td scope="row"> {{$candidat->name}} </td>
                                                                <td scope="row">{{$candidat->phone_number}} </td>
                                                                <td class="client-name"> {{$candidat->email}}</td>
                                                                <td class="client-name"> {{$candidat->job}}</td>
                                                                <td class="client-name"> {{$candidat->department}} </td>
                                                                <td class="client-name"> {{$candidat->scound_department}} </td>
                                                                <td class="client-name"> k0</td>
                                                                <td class="">
                                                                    <div class="d-flex">
                                                                        <button class="btn btn-outline-warning btn-sm mr-1" data-target="#choseAttendType" data-toggle="modal"> قبول </button>
                                                                        <button class="btn btn-outline-warning btn-sm mr-1" data-target="#choseAttendType" data-toggle="modal">   اعتذر </button>
                                                                        <button class="btn btn-outline-warning btn-sm mr-1" data-target="#choseAttendType" data-toggle="modal">   قبول باستثناء </button>
                                                                    </div>
                                                                    <div class="d-flex mt-2 text-center">
                                                                        <span class="tag tag-rounded bg-success-gradient text-white ml-2"> تم القبول </span>
                                                                        <span class="tag tag-rounded bg-danger-gradient text-white">  اعتذر </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{--end row table children --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                                {{--end row Tap --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')

@endsection
