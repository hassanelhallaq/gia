@extends('dashboard.layouts.master')
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0" style="border-top: 1px solid #00000030;">
    <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="../index.html" >الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="view_programmes.html" class="text-muted">البرامج</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">
        <div class=" d-flex">
            <button class="btn btn-outline-light btn-print"> طباعة <i class="icon ion-ios-print"></i></button>
            <button class="btn btn-outline-light mr-1 btn-export"> تصدير <i class="ti-stats-up project"></i></button>
            <a class="btn btn-warning-gradient btn-with-icon mr-1" href="create_programme.html">  انشاء برنامج <i class="bi bi-plus"></i></a>
        </div>
    </div>
</div>
@endsection
@section('content')

        <!-- row -->
        <div class="row row">

            <!--open filter Top  -->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex p-3">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input" id="search-table" placeholder="بحث">
                            <span class="right-pan"><i class="bi bi-sliders"></i></span>
                        </div>

                        {{-- <div class="d-flex">
                            <p class="mt-2 mr-2 d-flex"> عرض: </p>
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

                        <div class="mr-auto d-block tx-20">
                            <a href="{{route('programs.create')}}" class="btn btn-warning-gradient btn-with-icon" type="button" > اضف <i class="bi bi-floppy"></i></a>
                            <a href=""{{route('programs.grid')}}><i class="typcn typcn-calendar-outline"></i></a>
                            <a href="{{route('programs.grid')}}"><i class="bi bi-grid"></i></a>
                            <a href=""><i class="bi bi-list bg-black-9 text-white"></i></a>
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
                            <div class="tab-pane active" id="tab11">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr class="tableHead">
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                 <th>
                                                     <i class="typcn typcn-folder"></i>
                                                     اسم البرنامج
                                                 </th>
                                                 <th>
                                                     <i class="si si-layers"></i>
                                                     عدد الدورات
                                                 </th>
                                                 <th>
                                                     <i class="mdi mdi-account-outline"></i>
                                                     العميل
                                                 </th>
                                                 <th><i class="far fa-calendar"></i> تاريخ البداية </th>
                                                 <th><i class="far fa-calendar"></i> تاريخ النهاية </th>

                                                 <th> الحالة </th>
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
                                        @foreach ($programs as $item)
                                            <tbody id="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات
                                                        لعرضها
                                                    </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td><input type="checkbox" class="checkChild"></td>
                                                    <td>3</td>
                                                     <td scope="row">{{$item->name}} </td>
                                                     <td>{{$item->courses_count}}</td>
                                                     <td class="client-name">{{$item->client->name ?? ''}}</td>
                                                     @php
                                                     $start = Carbon\Carbon::parse($item->start)->format('y-m-d');
                                                     $end = Carbon\Carbon::parse($item->end)->format('y-m-d');
                                                    @endphp
                                                       <td>{{$start }}</td>
                                                       <td>{{$end }}</td>
                                                     <td>
                                                         <span class="tag tag-rounded bg-primary-transparent text-primary">في المعالجة</span>
                                                     </td>
                                                     <td class="d-flex filter-col-cell">
                                                        <a href="{{route('program.course',[$item->id])}}"><i class="far fa-eye tx-15"></i></a>                                                        <!-- dropdown-menu -->
                                                        <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i class="si si-options-vertical text-gray tx-13" ></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="edit_programme.html" class="dropdown-item"> تحرير </a>
                                                            <a href="" class="dropdown-item"data-target="#modalDelete" data-toggle="modal"> حذف </a>
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
                           {!! $programs->links() !!}
                        </ul>

                        {{-- <div class="mr-auto tx-15 mt-2">
                            <span id="table-status">1-6 of 100</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--closed filter bottom  -->
        </div>
        <!-- row closed -->



    </>
@endsection
