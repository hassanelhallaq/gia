@extends('dashboard.layouts.master')
@section('header')

    <div class="main-header sticky side-header nav nav-item">

        <!-- breadcrumb -->
        <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0"
            style="border-top: 1px solid #00000030;">
            <div class="left-content">
                <div>
                    <p class="mg-b-0">مرحبا بك مجددا</p>
                    <h4 class="main-content-title tx-18 mg-b-1 mg-b-lg-1">  {{Auth::user()->name}}</h4>

                </div>
            </div>
            <div class="main-dashboard-header-right">
                <div class=" d-flex">
                    <a href="{{route('programs.create')}}"
                        class="btn btn-warning-gradient btn-with-icon mr-1"> انشاء مشروع <i
                            class="bi bi-plus"></i></a>
                    {{-- <button class="btn btn-warning-gradient btn-with-icon mr-1"data-target="#modaladd"
                        data-toggle="modal"> اضافة مشاركين <i class="bi bi-plus"></i></button> --}}
                    <button class="btn btn-warning-gradient btn-icon mr-1"><i
                            class="si si-options-vertical"></i></button>
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->
    </div>
@endsection
@section('content')
         <!-- main-header opened -->

        <!-- /main-header -->


         <!-- container opened -->
             <!-- row -->
             <div class="row mb-5">
                <h5 class=" text-center m-auto"> الصفحة الرئيسية  </h5>
            </div>
            <div class="row row-sm sales-cardSmall">
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body  iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-book text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد المشاريع الكلي</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">{{$programs}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-book text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد المشاريع القائمة</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">{{$programsActice->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="si si-layers text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد الدورات الكلي</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">{{$courses}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="si si-layers text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد الدورات القائمة</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">{{$events->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-group-outline text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عددالمسجلين</p>
                                   @php

                                    $count = 0 ;
                                    if (Auth::guard('client')->check()) {

                                        foreach ($attendance as $key => $value) {
                                            foreach ($value->courses as $key => $course) {

                                                $count += $course->attendances_count;
                                            }
                                        }


                                        }elseif (Auth::guard('admin')->check()){

                                            $attendance = $attendance;
                                        }

                                    @endphp
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">@if(Auth::guard('admin')->check()){{$attendance}}
                                        @elseif (Auth::guard('client')->check()) {{$count}} @else 0  @endif
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->

            <!-- row opened -->
            {{-- <div class="row row-sm">
                <div class="col-xl-7 col-sm-12 ">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="main-content-label mg-b-2 LineChart">
                                    معدل الحضور على مدار الوقت
                                </div>
                                <i class="si si-options-vertical text-gray"></i>

                            </div>
                            <div class="chartjs-wrapper-demo">
                                <div class="chartjs-size-monitor"
                                    style="position: absolute;direction: rtl; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="chartLine1" class="chartjs-render-monitor" style="direction: rtl;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-sm-12 " style="height: 100% !important;">
                    <div class="card pb-5">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="main-content-label mg-b-2">
                                    نسبة الدورات المكتملة
                                </div>
                                <i class="si si-options-vertical text-gray"></i>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart" class=""></div>
                            <div class="row">
                                <div class="col-md-12 col text-center">
                                    <h3 class="">الدورات المكتملة</h3>
                                    <span class="fs-14 text-muted">
                                        50% من الدورات مكتملة
                                    </span>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
            <!-- row closed -->

            <!-- row opened -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="panel panel-primary tabs-style-3 bg-white card card-dashboard-eight pb-2">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab11" class="active d-flex" data-toggle="tab"><i
                                                class="text-center text-purple cartTap  bg-purple-transparent  brround">10</i>المشاريع
                                            القائمة</a></li>
                                    <li><a href="#tab12" data-toggle="tab" class="d-flex"><i
                                                class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i>الدورات
                                            القائمة</a></li>
                                    {{-- <li><a href="#tab13" data-toggle="tab" class="d-flex"><i
                                                class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i>اخر
                                            الدعوات</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab11">
                                    <div class="table-responsive">
                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr class="list-unstyled">
                                                    <th>
                                                        <i class="typcn typcn-folder"></i>
                                                        اسم المشروع
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
                                                    <th>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-check-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                        </svg>
                                                        استعراض البرنامج                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($programsActice->take(3) as $item)


                                                <tr>
                                                    <td scope="row">مشروع {{$item->name}}</td>
                                                    <td>{{$item->courses_count}}</td>
                                                    <td>{{$item->client->name}}</td>
                                                    <td>{{$item->start}}</td>
                                                    <td>{{$item->end}}</td>
                                                     <td> <a href="{{route('program.course',[$item->id])}}"><i class="far fa-eye tx-15"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab12">
                                    <div class="table-responsive">
                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr class="list-unstyled">
                                                    <th>
                                                        <i class="typcn typcn-folder"></i>
                                                        اسم الدوره
                                                    </th>
                                                    <th>
                                                        <i class="si si-layers"></i>
                                                        عدد المتقدمين
                                                    </th>
                                                    <th>
                                                        <i class="mdi mdi-account-outline"></i>
                                                        المشروع
                                                    </th>
                                                    <th><i class="far fa-calendar"></i> تاريخ البداية </th>
                                                    <th><i class="far fa-calendar"></i> عدد الايام </th>
                                                    <th>

                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($events->take(3) as $item)


                                                <tr>
                                                    <td scope="row">{{$item->name}}</td>
                                                    <td>{{$item->attendances_count}}</td>
                                                    <td>{{$item->program->name}}</td>
                                                    <td>{{$item->start}}</td>
                                                    <td>{{$item->duration}}ايام</td>
                                                    <td>
                                                        <a href="{{ route('courses.show', [$item->id]) }}"><i
                                                            class="far fa-eye text-gray tx-13 ml-4"></i></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab13">
                                    <div class="table-responsive">
                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr class="list-unstyled">
                                                    <th>
                                                        <i class="typcn typcn-folder"></i>
                                                        اسم المشروع
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
                                                    <th>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-check-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                        </svg>
                                                        الحالة
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-success">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-warning-transparent text-warning">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
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


            </div>
            <!-- row close -->

            <!-- row opened -->
            {{-- <div class="row row-sm">
                @foreach ($programsActice->take(3) as $item)
                <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature2">

                                <i
                                    class="fe fe-award ht-50 wd-50 text-center card-chart text-purple bg-purple-transparent brround"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-2 tx-16">مشروع {{$item->name}}</h5>
                                <li class="mdi mdi-dots-vertical"></li>
                            </div>
                            <hr>
                            <span class="fs-14 text-muted">
                               {{$item->content_two}}
                            </span>
                            <hr>
                            <div class="demo-avatar-group">

                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle  mr-2" src="{{asset('assets/img/faces/5.jpg')}}">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="{{asset('assets/img/faces/3.jpg')}}">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="{{asset('assets/img/faces/4.jpg')}}">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="{{asset('assets/img/faces/5.jpg')}}">
                                </div>


                                <div class="mr-3">
                                    <span class="badge badge-success">+</span>
                                    <span class="label mr-1">دعوة</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> --}}
            <!-- /row -->
         <!-- container closed -->

@endsection
@section('js')
{{-- chartjs --}}
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
<script src="{{ URL::asset('assets/js/chart.chartjs.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
@endsection

