@extends('dashboard.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css-rtl/chartCircle.css') }}" rel="stylesheet" />
@endsection
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">

        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('programs.index') }}"class="text-muted">البرامج</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('program.course', [$course->program->id]) }}" class="text-muted"> برنامج
                            {{ $course->program->name }} </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> {{ $course->name }}</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right flex-wrap">
            <div class=" d-flex">
                <a href="{{ route('get.rate', [$course->id]) }}"
                    class="btn btn-outline-light btn-with-icon btn-sm mr-1">التقيم <i class="la la-cog"></i></a>
                <a href="{{ route('course.attendance', [$course->id]) }}"
                    class="btn btn-outline-light btn-with-icon btn-sm mr-1"> ادارة المشاركين <i class="la la-cog"></i></a>
                <a href="{{ route('quiz.report', [$course->id]) }}" class="btn btn-outline-light btn-with-icon btn-sm mr-1">
                    تحميل نتائج
                    الاختبار <i class="bi bi-box-arrow-in-down"></i></a>
                <a href="{{ route('quiz.befor.report', [$course->id]) }}"
                    class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل نتائج
                    الاختبار القبلي <i class="bi bi-box-arrow-in-down"></i></a>
                <a href="{{ route('quiz.after.report', [$course->id]) }}"
                    class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل نتائج
                    الاختبار البعدي <i class="bi bi-box-arrow-in-down"></i></a>
                <a href="{{ route('quiz.rate.report', [$course->id]) }}"
                    class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل نتائج
                    الاختبار التفاعلي <i class="bi bi-box-arrow-in-down"></i></a>
                <a href="{{ route('attendance.xlsx', [$course->id]) }}"
                    class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل تقرير المشاركين <i
                        class="bi bi-box-arrow-in-down"></i></a>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/css-rtl/drawar-user.css') }}" rel="stylesheet">
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
                                <h4 class="mb-1 font-weight-bold">{{ $course->attendances_count }}</h4>
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
                            <i class="typcn typcn-document-text text-warning tx-24"></i>
                        </div>
                        <div class="">
                            <p class="mb-2 tx-12 text-muted">نسبة الأختبار القبلي </p>
                            <div class="d-flex">
                                <h4 class="mb-1 font-weight-bold">{{ $quizAtendBefor }}</h4><span> من
                                    {{ $course->attendances_count }} </span>
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
                            <i class="bi bi-cash-stack text-warning tx-24"></i>
                        </div>
                        <div class="">
                            <p class="mb-2 tx-12 text-muted"> نسبة اجتياز طلبات الشهادة</p>
                            <div class="d-flex">
                                <h4 class="mb-1 font-weight-bold">{{ $courseAttendancesEmail->attendances_email_count }}
                                </h4><span> من {{ $course->attendances_count }} </span>
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
                            <p class="mb-2 tx-11 text-muted"> نسبة اجتياز الاختبار التفاعلي</p>
                            <div class="">
                                <h4 class="mb-1 font-weight-bold">{{ $quizAtendInteractive }}</h4><span> من
                                    {{ $course->attendances_count }} </span>
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
                            <i class="bi bi-collection text-warning tx-24"></i>
                        </div>
                        <div class="">
                            <p class="mb-2 tx-12 text-muted"> نسبة الاختبار البعدي </p>
                            <div class="">
                                <h4 class="mb-1 font-weight-bold">{{ $quizAtendAfter }}</h4><span> من
                                    {{ $course->attendances_count }} </span>
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

    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5 d-flex justify-content-between">
                        <h5>معدل حضور دورة {{ $course->name }}</h5>
                    </div>
                    <div class="ht-200 ht-sm-300" id="flotArea1"></div>
                </div>
            </div>
        </div>
        <!-- col-6 -->
        <div class="col-lg-6 col-sm-12">
            <div class="card ">
                <div class="card-body">
                    @php
                        $integerNumber = intval($avrageAttend);
                    @endphp
                    <span class="chart" data-percent="{{ $integerNumber }}">
                        <span class="percent"></span>
                    </span>
                    <div class="row pb-4  mg-t-60">
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
                                @foreach ($course->attendances as $i => $item)
                                    <tr class="table-rows">
                                        <td scope="row"> {{ $i + 1 }} </td>
                                        <td scope="row"> {{ $item->name }} </td>
                                        <td>{{ $item->work_place }} </td>
                                        <td class="client-name"> {{ $item->phone_number }} </td>
                                        <td>{{ $item->id_number }} </td>
                                        <td>{{ $item->is_accepted == 1 ? 'تم القبول' : 'تم الرفض' }} </td>
                                        <td>{{ $item->job }} </td>
                                        <td class="d-flex">
                                            <span class="ml-3 examBefor" data-bs-toggle="offcanvas"
                                                data-bs-target="#drawerbefore_{{ $item->id }}"
                                                aria-controls="offcanvasWithBothOptions"> قبلي</span>
                                            <!-- <span class="ml-3 examBefor" onclick="openSideDrawer()">بعدي</span> -->
                                            <span class="ml-3 examBefor" data-bs-toggle="offcanvas"
                                                data-bs-target="#drawerafter_{{ $item->id }}"
                                                aria-controls="offcanvasWithBothOptions"> بعدي </span>
                                        </td>
                                        <td>
                                            <span class="ml-2 dropdown">
                                                {{ $course->duration }} ايام
                                            </span>

                                            <button class="btn btn-previous p-0" data-toggle="dropdown"><i
                                                    class="bi bi-exclamation-circle"></i></button>

                                            <div class="Attendance dropdown-menu scrollable-menu">
                                                @php
                                                    $courseStartDate = \Carbon\Carbon::parse($course->start);
                                                    $attendanceLogin = App\Models\AttendanceLogin::where([['attendance_id', $item->id], ['course_id', $course->id]])->count();
                                                @endphp
                                                @for ($day = 1; $day <= $course->duration; $day++)
                                                    @php
                                                        $startDate = $courseStartDate
                                                            ->copy()
                                                            ->addDays($day - 1)
                                                            ->startOfDay();
                                                        $endDate = $courseStartDate
                                                            ->copy()
                                                            ->addDays($day)
                                                            ->startOfDay();
                                                        $log = $item->attendance_logins
                                                            ->whereBetween('created_at', [$startDate, $endDate])
                                                            ->where('course_id', $course->id)
                                                            ->first();
                                                    @endphp
                                                    @if ($log)
                                                        <span class="dropdown-item text-success"> اليوم
                                                            {{ $day }} (حاضر)</span>
                                                        <button class=" btn btn-warning-gradient btn-with-icon mr-1"
                                                            type="button"
                                                            onclick="Delattend({{ $item->id }},{{ $course->id }},{{ $day }})">حذف
                                                            حضور</button>
                                                    @else
                                                        <span class="dropdown-item text-danger"> اليوم {{ $day }}
                                                            (غير حاضر)
                                                        </span>
                                                        <button class=" btn btn-warning-gradient btn-with-icon mr-1"
                                                            type="button"
                                                            onclick="attend({{ $item->id }},{{ $course->id }},{{ $day }})">تسجيل
                                                            حضور</button>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>

                                        <td>
                                            @if ($attendanceLogin != 0)
                                                {{ intval(($attendanceLogin / $course->duration) * 100) }}%
                                            @else
                                                0%
                                            @endif
                                        </td>
                                        <td><a href="{{ route('invitation.index', [$item->id, 'course_id' => $course->id]) }}"
                                                target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
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
    <!-- row closed -->


    <!-- row -->
    <div class="row mb-5">
        <div class="col-lg-6 col-sm-12">
            <div class="panel panel-primary tabs-style-3 bg-white card card-dashboard-eight ">
                <div class="d-flex justify-content-between mb-2 ">
                    <h5 class="">ملفات الدورة</h5>
                    <button class="btn btn-secondary btn-sm btn-light-icon mr-2 p-1" data-target="#select2modal"
                        data-toggle="modal"> اضافة ملف <i class="bi bi-plus-circle"></i></button>
                    @include('dashboard.courses.model_add_file')

                </div>
                <div class="tab-menu-heading">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#tab11" data-toggle="tab" class="d-flex active"> الكل <i
                                        class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a>
                            </li>
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
                                        <p class="tx-10">{{ $item->name }} </p>
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
                    <button class="btn btn-secondary btn-sm btn-light-icon mr-2 p-1" data-target="#modalurl"
                        data-toggle="modal"> اضافة رابط <i class="bi bi-plus-circle"></i></button>
                    @include('dashboard.courses.model_add_url')
                </div>
                <div class="tab-menu-heading">
                    <div class="tabs-menu mb-1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#tab11" data-toggle="tab" class="d-flex active"> الكل <i
                                        class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i></a>
                            </li>
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
                                        <a href="{{ $item->link }}" target="_blank">
                                            <p class="tx-10"> نسخ الرابط</p>
                                        </a>
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
                                        <input class="custom-file-input" id="certficate_{{ $item->id }}"
                                            type="file">
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



    <!-- delete modal -->
    <div class="modal" id="modalDelete">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title"> حذف البرامج </h5><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row mg-t-10">
                            <div class="col-12">
                                <p class="text-danger"> هل انت متأكد من عملية الحذف؟</p>
                                <input class="form-control" required="" type="text" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger btn-with-icon" type="submit"> حذف <i
                                class="bi bi-trash tx-12"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End delete modal -->

    <!-- قبلي-->
    <!-- Begin Side Drawer before-->
    {{-- @foreach ($course->attendances as $item)
        <div class="offcanvas offcanvas-start bg-light" data-bs-scroll="true" tabindex="-1"
            id="drawerbefore_{{ $item->id }}" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-body d-flex align-items-start flex-column mb-3 justify-content-between bg-light p-0">
                <div class="list m-auto text-center">
                    <i class="bi bi-person-circle tx-80"></i>
                    <p class="wrapper">
                        <b class="text-center"> {{ $item->name }}</b>
                    </p>
                    @php
                        $quiz = App\Models\QuizCourse::where('course_id', $course->id)
                            ->with('quiz')
                            ->whereHas('quiz', function ($q) {
                                $q->where('type', 'befor');
                            })
                            ->first();
                        if ($quiz) {
                            $responseAnswers = App\Models\UserAnswer::where('quiz_id', $quiz->quiz_id)
                                ->where('attendance_id', $item->id)
                                ->get();
                            $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
                            $responseAnswersFalse = $responseAnswers->where('is_true', 0)->count();
                            $questions = App\Models\Question::where('quiz_id', $quiz->quiz_id)
                                ->with('userAswes', 'optionTrue')
                                ->get();
                        } else {
                            $responseAnswersTrue = 0;
                        }

                        if ($responseAnswersTrue != 0) {
                            $total = ($responseAnswersTrue / $questions->count()) * 100;
                        } else {
                            $total = 0;
                        }
                    @endphp
                    <p class="wrapper">
                        <b>نتيجة الأختبار</b>
                    <h3> <b class="text-center"> {{ $total }} %</b>
                        <h3>
                            </p>

                </div>
                <div class="list p-3">
                    <div class="row row-sm">
                        <div class="col-6">
                            @if ($course)
                                <a class="card text-center"
                                    href="{{ route('attendance.summery', [$course->id, $item->id]) }}">
                            @endif
                            <div class="card-body p-2">
                                <div class="feature widget-2 text-center mb-3">
                                    <i
                                        class="bi bi-clipboard2-data-fill project bg-warning-transparent mx-auto text-warning "></i>
                                </div>
                                <p class="mb-1 text-muted tx-13"> عرض نموذج الاجابات </p>
                            </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i
                                            class="icon ion-md-paper project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted tx-13"> تحميل نموذج الاجابات </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i
                                            class="bi bi-pencil-fill  project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> الأختبار القبلي </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <a class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">

                                        <i
                                            class="icon ion-md-paper-plane project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> استلام الاختبار </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach --}}
    <!--/Sidebar-right-->

    <!--  بعدي-->
    <!-- Begin Side Drawer after -->
    {{-- @foreach ($course->attendances as $item)
        <div class="offcanvas offcanvas-start bg-light" data-bs-scroll="true" tabindex="-1"
            id="drawerafter_{{ $item->id }}" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-body d-flex align-items-start flex-column mb-3 justify-content-between bg-light p-0">
                <div class="list m-auto text-center">
                    <i class="bi bi-person-circle tx-80"></i>
                    <!-- <a class="profile-user" href=""><img alt="" src="../assets/img/1.jpg" class="rounded-circle"></a> -->
                    <p class="wrapper">
                        <b class="text-center"> {{ $item->name }}</b>
                    </p>
                    @php
                        $quiz = App\Models\QuizCourse::where('course_id', $course->id)
                            ->with('quiz')
                            ->whereHas('quiz', function ($q) {
                                $q->where('type', 'after');
                            })
                            ->first();
                        if ($quiz) {
                            $responseAnswers = App\Models\UserAnswer::where('quiz_id', $quiz->quiz_id)
                                ->where('attendance_id', $item->id)
                                ->get();
                            $responseAnswersTrue = $responseAnswers->where('is_true', 1)->count();
                            $responseAnswersFalse = $responseAnswers->where('is_true', 0)->count();
                            $questions = App\Models\Question::where('quiz_id', $quiz->quiz_id)
                                ->with('userAswes', 'optionTrue')
                                ->get();
                        } else {
                            $responseAnswersTrue = 0;
                        }

                        if ($responseAnswersTrue != 0) {
                            $total = ($responseAnswersTrue / $questions->count()) * 100;
                        } else {
                            $total = 0;
                        }
                    @endphp
                    <p class="wrapper">
                    <h3> <b class="text-center"> {{ $total }} %</b> </h3>
                    </p>
                </div>


                <div class="list p-3">
                    <div class="row row-sm">
                        <div class="col-6">
                            @if ($course)
                                <a class="card text-center"
                                    href="{{ route('attendance.summery.after', [$course->id, $item->id]) }}">
                            @endif
                            <div class="card-body p-2">
                                <div class="feature widget-2 text-center mb-3">
                                    <i
                                        class="bi bi-clipboard2-data-fill project bg-warning-transparent mx-auto text-warning "></i>
                                </div>
                                <p class="mb-1 text-muted tx-13"> عرض نموذج الاجابات </p>
                            </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a class="card text-center" href="">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mb-3">
                                        <i
                                            class="bi bi-box-arrow-in-down project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted tx-13 "> تحميل ملف المشارك </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i
                                            class="bi bi-box-arrow-in-down project bg-warning-transparent mx-auto text-warning "></i>
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

            </div>
        </div>
    @endforeach --}}
    <div id="side-drawer-void" class="position-fixed d-none" onclick="closeSideDrawer()"></div>

@endsection
@section('js')
    <script src="{{ asset('assets/js/drawar-user.js') }}"></script>

    <script>
        function openSideDrawer() {
            document.getElementById("side-drawer").style.left = "0";
            document.getElementById("side-drawer-void").classList.add("d-block");
            document.getElementById("side-drawer-void").classList.remove("d-none");
        }

        function closeSideDrawer() {
            document.getElementById("side-drawer").style.left = "-336px";
            document.getElementById("side-drawer-void").classList.add("d-none");
            document.getElementById("side-drawer-void").classList.remove("d-block");
        }

        function performStore(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('file_name').value);
            formData.append('type', document.getElementById('type').value);
            formData.append('course_id', id);
            formData.append('file', document.getElementById('file').files[0]);
            storeRoute('/dashboard/admin/courses-files', formData)
        }

        function performStoreLink(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name_link').value);
            formData.append('link', document.getElementById('link').value);
            formData.append('course_id', id);
            storeRoute('/dashboard/admin/courses-links', formData)
        }

        function activeCourse(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('status', 'active');
            storeRoute('/dashboard/admin/status-update/' + id, formData)
        }

        function attend(id, courseId, day) {
            let formData = new FormData();
            formData.append('course_id', courseId);
            formData.append('attendance_id', id);
            formData.append('day', day);
            storepart('/dashboard/admin/attend', formData)
        }

        function Delattend(id, courseId, day) {
            let formData = new FormData();
            formData.append('course_id', courseId);
            formData.append('attendance_id', id);
            formData.append('day', day);
            storepart('/dashboard/admin/delete-attend', formData)
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
    <script src="{{ asset('assets/js/chart.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/js/chartCircle.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--chart round js -->
@endsection
