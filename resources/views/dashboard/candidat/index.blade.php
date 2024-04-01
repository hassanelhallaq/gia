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
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
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
                                        value="{{ request()->seacrh_name }}" id="seacrh_name" placeholder="بحث">
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
                                <th>
                                    الأسم
                                </th>
                                <th>جهة العمل</th>
                                <th> رقم الهاتف </th>

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
                            <tr>
                                <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها</p>
                            </tr>
                            @foreach ($candidat as $i => $item)
                                <tr class="table-rows">
                                    <td scope="row"> {{ $i + 1 }} </td>
                                    <td scope="row"> {{ $item->name }} </td>
                                    <td class="client-name"> {{ $item->phone_number }} </td>

                                    <td class="d-flex filter-col-cell">
                                        <!-- dropdown-menu -->
                                        <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i
                                                class="si si-options-vertical text-gray tx-13"></i></button>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item"
                                                data-target="#modaledit_{{ $item->id }}" data-toggle="modal">
                                                تحرير </a>
                                            <a href="#"
                                                class="dropdown-item text-danger"data-target="#modalDelete"
                                                data-toggle="modal"> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <ul class="pagination mb-0">
                    </ul>

                    </li>
                </ul>
                {{-- <div class="d-flex">
                     <div class="d-block mt-2"> عرض</div>
                     <select class="form-control select2-no-search mr-0 table-rows-number">
                         <option value="all">
                             الكل
                         </option>
                         <option value="1">
                             1
                         </option>
                         <option value="2">
                             2
                         </option>
                         <option value="3">
                             3
                         </option>
                         <option value="10" selected>
                             10
                         </option>
                         <option value="50">
                             50
                         </option>
                         <option value="100">
                             100
                         </option>
                     </select>
                 </div> --}}
                {{-- <div class="mr-auto tx-15 mt-2">
                     <span id="table-status">1-6 of 100</span>
                 </div> --}}
            </div>
        </div>
    </div>
    <!--closed filter bottom  -->
</div>
@endsection
