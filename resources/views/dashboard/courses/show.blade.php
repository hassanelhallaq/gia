@extends('dashboard.layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@endsection
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">

     <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="../index.html" >الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('programs.index')}}"class="text-muted">البرامج</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('program.course',[$course->program->id])}}" class="text-muted"> برنامج {{$course->program->name}} </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> {{$course->name}}</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right flex-wrap">
        <div class=" d-flex">
            <button class="btn btn-outline-light btn-with-icon btn-sm mr-1"  onclick="activeCourse({{$course->id}})"> @if($course->status == 'active') مفعله @else تفعيل الدورة @endif</button>
            <a href="{{route('course.attendance',[$course->id])}}" class="btn btn-outline-light btn-with-icon btn-sm mr-1"> ادارة المشاركين  <i class="la la-cog"></i></a>
            <a href="View_test_results.html" class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل نتائج الاختبار  <i class="bi bi-box-arrow-in-down"></i></a>
            <button class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل تقرير المشاركة  <i class="bi bi-box-arrow-in-down"></i></button>
        </div>
    </div>
</div>

  @endsection
@section('content')

         <!-- row -->
        <div class="row row-sm sales-cardSmall">
            <div class="col-xl-part">
                <div class="card">
                    <div class="card-body  iconfont text-right d-flex justify-content-between">
                        <div class="d-flex mb-0">
                            <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                <i class="typcn typcn-group-outline text-warning tx-24"></i>
                            </div>
                            <div class="">
                                <p class="mb-2 tx-12 text-muted"> عدد المشاركين </p>
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold">{{$course->attendances_count}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <div class="dropdown">
                                <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                data-toggle="dropdown" id="dropdownMenuButton"></i>
                                <div  class="dropdown-menu tx-13">
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
                                <i class="typcn typcn-document-text text-warning tx-24"></i>
                            </div>
                            <div class="">
                                <p class="mb-2 tx-12 text-muted">نسبة الأختبار القبلي  </p>
                                <div class="d-flex">
                                    <h4 class="mb-1 font-weight-bold">13</h4><span> من 50 </span>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <div class="dropdown">
                                <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                data-toggle="dropdown" id="dropdownMenuButton"></i>
                                <div  class="dropdown-menu tx-13">
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
                                <i class="bi bi-cash-stack text-warning tx-24"></i>
                            </div>
                            <div class="">
                                <p class="mb-2 tx-12 text-muted"> التكاليف المقدمة </p>
                                <div class="d-flex">
                                    <h4 class="mb-1 font-weight-bold">13</h4><span> من 50 </span>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <div class="dropdown">
                                <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                data-toggle="dropdown" id="dropdownMenuButton"></i>
                                <div  class="dropdown-menu tx-13">
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
                                <p class="mb-2 tx-11 text-muted"> متوسط نسبة الحضور </p>
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold">500</h4>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <div class="dropdown">
                                <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                data-toggle="dropdown" id="dropdownMenuButton"></i>
                                <div  class="dropdown-menu tx-13">
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
                                <i class="bi bi-collection text-warning tx-24"></i>
                            </div>
                            <div class="">
                                <p class="mb-2 tx-12 text-muted"> نسبة الاختبار البعدي </p>
                                <div class="">
                                    <h4 class="mb-1 font-weight-bold">500</h4>
                                </div>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <div class="dropdown">
                                <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                data-toggle="dropdown" id="dropdownMenuButton"></i>
                                <div  class="dropdown-menu tx-13">
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

        <!-- row -->
        <div class="row row-sm">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5 d-flex justify-content-between">
                             <h5>معدل حضور دورة {{$course->name}}</h5>
                        </div>
                        <div class="ht-200 ht-sm-300" id="flotArea1"></div>
                    </div>
                </div>
            </div>
            <!-- col-6 -->
            <div class="col-lg-6 col-sm-12">
                <div class="card pb-5">
                    <div class="card-body">
                        <div id="chart" class=""></div>
                        <div class="row pb-5" >
                            <div class="col-md-12 col text-center">
                                <h3 class=""> متوسط الأكتمال </h3>
                                <span class="fs-14 text-muted">
                                 متوسط الأكتمال كل المشاركين
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /row -->

    <!-- row -->
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
                                        <input type="text" class="form-control form-input" name="name"
                                            value="{{ request()->name }}" id="name" placeholder="بحث">
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
                                   <th> الرقم الوظيفي </th>
                                   <th> قبول الدعوه </th>

                                   <th> المهنة </th>
                                   <th> الاختبارات </th>
                                   <th> الحضور </th>
                                   <th> الاكتمال </th>
                                   <th> الدعوه </th>

                                   {{-- <th> الشهادة </th> --}}
                                    <td class="col-filter">
                                    <!-- dropdown-menu -->
                                        <button data-toggle="dropdown"
                                            class="btn btn-previous p-0"><i
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
                               @foreach ($course->attendances as $i => $item)
                               <tr class="table-rows">
                                <td scope="row"> {{ $i + 1 }} </td>
                                   <td scope="row"> {{ $item->name }} </td>
                                   <td>{{ $item->work_place }} </td>
                                   <td class="client-name"> {{ $item->phone_number }} </td>
                                   <td>{{ $item->id_number }} </td>
                                   <td>{{ $item->is_accepted == 1 ? "تم القبول" : "تم الرفض" }} </td>
                                   <td>{{ $item->job }} </td>
                                   <td class="d-flex">
                                       <span class="ml-3 examBefor" data-bs-toggle="offcanvas" data-bs-target="#drawerbefore_{{$item->id}}" aria-controls="offcanvasWithBothOptions"> قبلي</span>
                                       <!-- <span class="ml-3 examBefor" onclick="openSideDrawer()">بعدي</span> -->
                                       <span class="ml-3 examBefor" data-bs-toggle="offcanvas" data-bs-target="#drawerafter_{{$item->id}}" aria-controls="offcanvasWithBothOptions"> بعدي </span>
                                   </td>
                                   <td>
                                    <span class="ml-2 dropdown">
                                        {{ $course->duration }} ايام
                                    </span>

                                    <button class="btn btn-previous p-0" data-toggle="dropdown"><i class="bi bi-exclamation-circle"></i></button>

                                    <div class="Attendance dropdown-menu scrollable-menu">
                                        @php
                                        $courseStartDate = \Carbon\Carbon::parse($course->start);
                                        $attendanceLogin = App\Models\AttendanceLogin::where([['attendance_id',$item->id],['course_id',$course->id]])->count();
                                        @endphp
                                        @for ($day = 1; $day <= $course->duration; $day++)
                                        @php
                                        $log = $item->attendance_logins
                                            ->whereBetween('created_at',[ $courseStartDate->copy()->addDays($day - 1)->startOfDay(),$courseStartDate->copy()->addDays($day)->startOfDay()])->where('course_id',$course->id)
                                            ->first();
                                        @endphp
                                            @if ($log)
                                                <span class="dropdown-item text-success"> اليوم {{ $day }} (حاضر)</span>
                                            @else
                                                <span class="dropdown-item text-danger"> اليوم {{  $day}} (غير حاضر)</span>
                                            @endif
                                        @endfor
                                    </div>
                                </td>

                                <td>
                                    @if($attendanceLogin != 0)
                                    {{($course->duration / $attendanceLogin) *100 }}%
                                    @else
                                    0%
                                    @endif
                                </td>
                                <td><a href="{{ route('invitation.index', [$item->id, 'course_id' => $course->id]) }}"
                                        target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
                                   <td class="d-flex filter-col-cell">
                                       <!-- dropdown-menu -->
                                       <button data-toggle="dropdown"
                                           class="btn btn-previous btn-sm btn-block"><i
                                               class="si si-options-vertical text-gray tx-13"></i></button>
                                       <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item"
                                        data-target="#modaledit_{{ $item->id }}"
                                        data-toggle="modal"> تحرير </a>
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
    <!-- row closed -->


        <!-- row -->
        <div class="row mb-5">
            <div class="col-lg-6 col-sm-12">
                <div class="panel panel-primary tabs-style-3 bg-white card card-dashboard-eight ">
                    <div class="d-flex justify-content-between mb-2 ">
                        <h5 class="">ملفات الدورة</h5>
                        <button class="btn btn-secondary btn-sm btn-light-icon mr-2 p-1" data-target="#select2modal" data-toggle="modal"> اضافة ملف <i class="bi bi-plus-circle"></i></button>
                        @include('dashboard.courses.model_add_file')

                    </div>
                    <div class="tab-menu-heading">
                        <div class="tabs-menu ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li><a href="#tab11" data-toggle="tab" class="d-flex active"> الكل  <i class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a></li>
                                {{-- <li><a href="#tab12" data-toggle="tab" class="d-flex"> اكسل <i class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a></li> --}}
                                {{-- <li><a href="#tab13" data-toggle="tab" class="d-flex"> وورد <i class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a></li> --}}
                                {{-- <li><a href="#tab14" data-toggle="tab" class="d-flex"> BDF <i class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body mt-0">
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab11">
                                <div class="table-responsive d-flex">
                                    @foreach ($courseFile as $item)
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p class="tx-10">{{$item->name}} </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- <div class="tab-pane" id="tab12">
                                <div class="table-responsive d-flex">
                                    <div class="ml-4">
                                        <i class="bi bi-filetype-exe tx-24"></i></i>
                                        <p>ملف1</p>
                                    </div>

                                    <div class="ml-4">
                                        <i class="bi bi-filetype-exe tx-24"></i>
                                        <p>ملف2</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-filetype-exe tx-24"></i>
                                        <p>ملف4</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-filetype-exe tx-24"></i>
                                        <p>ملف5</p>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="tab-pane" id="tab13">
                                <div class="table-responsive d-flex">
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف1</p>
                                    </div>

                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-24"></i>
                                        <p>ملف2</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-24"></i>
                                        <p>ملف4</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-24"></i>
                                        <p>ملف5</p>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="tab-pane" id="tab14">
                                <div class="table-responsive d-flex">
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <p>ملف 1</p>
                                    </div>

                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-24"></i>
                                        <p>ملف2</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-24"></i>
                                        <p>ملف4</p>
                                    </div>
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-24"></i>
                                        <p>ملف5</p>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="panel panel-primary tabs-style-3 bg-white card card-dashboard-eight ">
                    <div class="d-flex justify-content-between mb-2">
                        <h5 class="">روابط الدورة</h5>
                        <button class="btn btn-secondary btn-sm btn-light-icon mr-2 p-1" data-target="#modalurl" data-toggle="modal"> اضافة رابط <i class="bi bi-plus-circle"></i></button>
                        @include('dashboard.courses.model_add_url')
                    </div>
                    <div class="tab-menu-heading">
                        <div class="tabs-menu mb-1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li><a href="#tab11" data-toggle="tab" class="d-flex active"> الكل  <i class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body mt-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab11">
                                <div class="table-responsive d-flex">
                                    @foreach ($courseLinks as $item)
                                    <div class="ml-4">
                                        <i class="bi bi-file-earmark-word-fill tx-26"></i>
                                        <a href="{{$item->link}}" target="_blank">     <p class="tx-10"> نسخ الرابط</p></a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- row closed -->



     <!-- Container closed -->
 <!-- main-content closed -->

 @foreach ($course->attendances as $item)
 <div class="modal" id="modaledit_{{ $item->id }}">
     <div class="modal-dialog " role="document">
         <div class="modal-content modal-content-demo">
             <div class="modal-header">
                 <h5 class="modal-title"> تحرير مشارك </h5><button aria-label="Close" class="close"
                     data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12">
                             <label for="example"> الأسم </label>
                             <input class="form-control" value="{{ $item->name }}"
                                 id="name_{{ $item->id }}" required="" type="text">
                         </div>
                         <div class="col-6 mt-4">
                             <label for="example"> رقم الهاتف </label>
                             <input class="form-control" value="{{ $item->phone_number }}"
                                 id="phone_number_{{ $item->id }}" required="" type="number">
                         </div>
                         <div class="col-6 mt-4">
                             <label for="example"> الرقم الوظيفي </label>
                             <input class="form-control" value="{{ $item->id_number }}"
                                 id="id_number_{{ $item->id }}" required="" type="number">
                         </div>
                         <div class="col-12 mt-4">
                             <label for="example"> المهنة </label>
                             <input class="form-control" value="{{ $item->job }}"
                                 id="job_{{ $item->id }}" required="" type="text">
                         </div>
                         <div class="col-12 mt-4">
                             <label for="example"> جهة العمل </label>
                             <input class="form-control" value="{{ $course->id }}"required="" hidden
                                 id="course_id" type="text">
                         </div>
                         <input class="form-control" value="{{ $item->work_place }}"required=""
                         id="work_place_{{ $item->id }}" type="text">
                         <div class="col-lg-3 mb-3">
                            <label for="exampleInputEmail1"> شهاده </label>
                            <div class="custom-file">
                                <input class="custom-file-input" id="certficate_{{ $item->id }}" type="file">
                                <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                            </div>
                        </div>
                     </div>
                 </div>
                 <div class="modal-footer border-0">
                     <button class="btn btn-warning-gradient btn-with-icon" type="button"
                         onclick="performUpdate({{ $item->id }})"> حفظ <i class="bi bi-floppy"></i></button>
                     <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
@endforeach

<!-- Message Modal -->
<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-right chatbox" role="document">
        <div class="modal-content chat border-0">
            <div class="card overflow-hidden mb-0 border-0">
                <!-- action-header -->
                <div class="action-header clearfix">
                    <div class="float-left hidden-xs d-flex ml-2">
                        <div class="img_cont mr-3">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img" alt="img">
                        </div>
                        <div class="align-items-center mt-2">
                            <h4 class="text-white mb-0 font-weight-semibold">Daneil Scott</h4>
                            <span class="dot-label bg-success"></span><span class="mr-3 text-white">online</span>
                        </div>
                    </div>
                    <ul class="ah-actions actions align-items-center">
                        <li class="call-icon">
                            <a href="" class="d-done d-md-block phone-button" data-toggle="modal" data-target="#audiomodal">
                                <i class="si si-phone"></i>
                            </a>
                        </li>
                        <li class="video-icon">
                            <a href="" class="d-done d-md-block phone-button" data-toggle="modal" data-target="#videomodal">
                                <i class="si si-camrecorder"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                <i class="si si-options-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><i class="fa fa-user-circle"></i> View profile</li>
                                <li><i class="fa fa-users"></i>Add friends</li>
                                <li><i class="fa fa-plus"></i> Add to group</li>
                                <li><i class="fa fa-ban"></i> Block</li>
                            </ul>
                        </li>
                        <li>
                            <a href=""  class="" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="si si-close text-white"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- action-header end -->

                <!-- msg_card_body -->
                <div class="card-body msg_card_body">
                    <div class="chat-box-single-line">
                        <abbr class="timestamp">February 1st, 2019</abbr>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            Hi, how are you Jenna Side?
                            <span class="msg_time">8:40 AM, Today</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <div class="msg_cotainer_send">
                            Hi Connor Paige i am good tnx how about you?
                            <span class="msg_time_send">8:55 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            I am good too, thank you for your chat template
                            <span class="msg_time">9:00 AM, Today</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ">
                        <div class="msg_cotainer_send">
                            You welcome Connor Paige
                            <span class="msg_time_send">9:05 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            Yo, Can you update Views?
                            <span class="msg_time">9:07 AM, Today</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            But I must explain to you how all this mistaken  born and I will give
                            <span class="msg_time_send">9:10 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            Yo, Can you update Views?
                            <span class="msg_time">9:07 AM, Today</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            But I must explain to you how all this mistaken  born and I will give
                            <span class="msg_time_send">9:10 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            Yo, Can you update Views?
                            <span class="msg_time">9:07 AM, Today</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            But I must explain to you how all this mistaken  born and I will give
                            <span class="msg_time_send">9:10 AM, Today</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <div class="img_cont_msg">
                            <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg" alt="img">
                        </div>
                        <div class="msg_cotainer">
                            Okay Bye, text you later..
                            <span class="msg_time">9:12 AM, Today</span>
                        </div>
                    </div>
                </div>
                <!-- msg_card_body end -->
                <!-- card-footer -->
                <div class="card-footer">
                    <div class="msb-reply d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="Typing....">
                            <div class="input-group-append ">
                                <button type="button" class="btn btn-primary ">
                                    <i class="far fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- card-footer end -->
            </div>
        </div>
    </div>
</div>


<!-- delete modal -->
<div class="modal" id="modalDelete">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title"> حذف البرامج </h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col-12">
                            <p class="text-danger">  هل انت متأكد من عملية الحذف؟</p>
                            <input class="form-control" required="" type="text" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-danger btn-with-icon" type="submit"> حذف <i class="bi bi-trash tx-12"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End delete modal -->

<!-- قبلي-->
<!-- Begin Side Drawer before-->
<div class="sidebar sidebar-left sidebar-animate bg-light">
    <div class="panel-body tabs-menu-body latest-tasks p-0 border-0 h-100 mt-0 bg-light">
        <div class="tab-content d-flex align-items-start flex-column mb-3 justify-content-between bg-light">
            <div class="list imgUser">
                <i class="bi bi-person-circle tx-80"></i>
                <!-- <a class="profile-user" href=""><img alt="" src="../assets/img/1.jpg" class="rounded-circle"></a> -->
                <p class="wrapper">
                    <b class="text-center"> محمد عبده </b>
                </p>
            </div>
            <div class="list p-3">
                <div class="row row-sm">
                        <div class="col-6">
                            <a class="card text-center" href="View_test_results.html">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mb-3">
                                        <i class="bi bi-clipboard2-data-fill project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted "> عرض نموذج الاجابات </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i class="icon ion-md-paper project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted tx-13"> تحميل نموذج الاجابات </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i class="bi bi-pencil-fill  project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> الأختبار القبلي </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <a class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">

                                        <i class="icon ion-md-paper-plane project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> استلام الاختبار </p>
                                </div>
                            </a>
                        </div>
                </div>
            </div>
            <div class="list p-3 w-100">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h6 class=""> الحالة </h6>
                    <p> تم التقدم </p>
                </div>
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h6 class=""> تاريخ التقدم </h6>
                    <p> 12 اكتوبر 23  </p>
                </div>
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h6 class=""> الوقت </h6>
                    <p> 12:23  </p>
                </div>
            </div>

        </div>
    </div>
</div>
<!--/Sidebar-right-->

<!--  بعدي-->
<!-- Begin Side Drawer after -->
<div id="side-drawer" class="position-fixed">
    <div class="panel-body tabs-menu-body latest-tasks p-0 border-0 h-100 mt-0 bg-light">
        <div class="tab-content d-flex align-items-start flex-column mb-3 justify-content-between bg-light">
            <div class="list imgUser">
                <i class="bi bi-person-circle tx-80"></i>
                <!-- <a class="profile-user" href=""><img alt="" src="../assets/img/1.jpg" class="rounded-circle"></a> -->
                <p class="wrapper">
                    <b class="text-center"> محمد عبده </b>
                </p>
            </div>
            <div class="list p-3">
                <div class="row row-sm">
                        <div class="col-6">
                            <a class="card text-center" href="">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mb-3">
                                        <i class="bi bi-box-arrow-in-down project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted tx-13 "> تحميل ملف المشارك </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i class="bi bi-box-arrow-in-down project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted tx-13"> تحميل ملف التكليف </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i class="bi bi-send  project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> استلام التكليف </p>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="list p-3 w-100">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h6 class=""> الحالة </h6>
                    <p> تم التقدم </p>
                </div>
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h6 class=""> تاريخ التقدم </h6>
                    <p> 12 اكتوبر 23  </p>
                </div>
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <h6 class=""> الوقت </h6>
                    <p> 12:23  </p>
                </div>
            </div>


        </div>
    </div>
</div>
 @endsection
@section('js')
<script>
    function performStore(id) {
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('type', document.getElementById('type').value);
        formData.append('course_id',id);
        formData.append('file', document.getElementById('file').files[0]);
        storeRoute('/dashboard/admin/courses-files', formData)
    }
    function performStoreLink(id) {
        let formData = new FormData();
        formData.append('name', document.getElementById('name_link').value);
        formData.append('link', document.getElementById('link').value);
        formData.append('course_id',id);
        storeRoute('/dashboard/admin/courses-links', formData)
    }
    function activeCourse(id) {
        let formData = new FormData();
                formData.append("_method", "PUT")
        formData.append('status', 'active');
        storeRoute('/dashboard/admin/status-update/' + id, formData)
    }

    function performUpdate(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', document.getElementById('name_' + id).value);
            formData.append('phone_number', document.getElementById('phone_number_' + id).value);
            formData.append('work_place', document.getElementById('work_place_' + id).value);
            formData.append('id_number', document.getElementById('id_number_' + id).value);
            formData.append('job', document.getElementById('job_' + id).value);
            formData.append('certficate', document.getElementById('certficate_' + id).files[0]);
            formData.append('course_id', document.getElementById('course_id').value);


            storepart('/dashboard/admin/attendance/' + id, formData)
        }
</script>
<script src="{{asset('assets/js/chart.flot.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--chart round js -->
@endsection
