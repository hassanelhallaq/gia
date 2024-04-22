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
                        <a href="{{ route('programs.index') }}" class="text-muted">المشاريع</a>
                    </li>
                    {{-- @if ($course)
                    <li class="breadcrumb-item">

                        <a href="{{route('program.course',[$course->program->id])}}" class="text-muted"> مشروع {{$course->program->name}} </a>
                    </li>
                    @endif --}}
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> المشتركين </a>

                    </li>
                </ol>
            </nav>

        </div>
        <div class="main-dashboard-header-right">
            <div class="d-flex flex-wrap">
                @if ($id)
                    <a href="{{ route('attendance.xlsx', [$id]) }}"
                        class="btn btn-outline-light btn-with-icon btn-sm mr-1 btn-export mb-1"> تصدير <i
                            class="ti-stats-up project"></i></a>
                    <a
                        href="{{ route('certificate.management', [$id]) }}"class="btn btn-outline-light btn-with-icon btn-sm mr-1">
                        الشهادات <i class="bi bi-clipboard-data tx-11"></i></a>
                @endif
                @can('اضافه مشترك')
                    <button class="btn btn-outline-light btn-with-icon btn-sm mr-1" data-target="#choseAttendType"
                        data-toggle="modal">
                        اضافة مشاركين جدد <i class="bi bi-plus"></i></button>
                @endcan

                <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1" data-target="#sendSms"
                    data-toggle="modal"> ارسال دعوة جماعية <i class="icon ion-md-paper-plane"></i></button>
                <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1" data-target="#sendSmsSelected"
                    data-toggle="modal"> ارسال دعوة محددة <i class="icon ion-md-paper-plane"></i></button>

                {{-- <a href="../index.html" class="btn btn-previous btn-sm text-warning mt-2"><i
                        class="ti-angle-double-right"></i> العودة </a> --}}
            </div>

        </div>

    </div>
@endsection

@section('css')
    <link href="{{ asset('assets/css-rtl/drawar-user.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- main-header opened -->

    <!-- /main-header -->


    <!-- container opened -->
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
                                        <input type="text" class="form-control form-input" name="name_search"
                                            value="{{ request()->name_search }}" id="name_search" placeholder="بحث">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <button class="btn btn-outline-light btn-print" type="submit"> بحث </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- <button class="btn btn-danger mr-1 text-white btnSelectDelete" data-target="#modalDelete"
                        data-toggle="modal" style="display: none;">حذف الصفوف المختارة <i
                            class="bi bi-trash tx-12"></i></button>
                    <div class="mr-auto d-block tx-20">
                        <a href=""><i class="typcn typcn-calendar-outline"></i></a>
                        <a href=""><i class="bi bi-grid"></i></a>
                        <a href=""><i class="bi bi-list bg-black-9 text-white"></i></a>
                    </div> --}}
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
                                        <tr>
                                            <th>

                                            </th>
                                            <th>
                                                الأسم
                                            </th>
                                            <th>جهة العمل</th>
                                            <th> رقم الهاتف </th>
                                            <th> الرقم الوظيفي </th>
                                            <th> قبول الدعوه </th>
                                            <th> المهنة </th>
                                            <th> الاختبارات </th>
                                            @if ($course)
                                                <th> الحضور </th>
                                            @endif
                                            <th> الاكتمال </th>
                                            <th> التقيم </th>

                                            @if ($id)
                                                <th> الدعوه </th>
                                            @endif
                                            <th> الحاله </th>

                                            <!-- Filter -->

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها
                                            </p>
                                        </tr>
                                        @foreach ($attendance as $item)
                                            <tr class="table-rows">
                                                <td scope="row"><input type="checkbox" class="form-data sub_chk"
                                                        data-id="{{ $item->id }}"> </td>

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
                                                @if ($course)
                                                    <td>
                                                        <span class="ml-2 dropdown">
                                                            {{ $course->duration }} ايام
                                                        </span>

                                                        <button class="btn btn-previous p-0" data-toggle="dropdown"><i
                                                                class="bi bi-exclamation-circle"></i></button>
                                                        `
                                                        <div class="Attendance dropdown-menu scrollable-menu">
                                                            @php
                                                                $courseStartDate = \Carbon\Carbon::parse(
                                                                    $course->start,
                                                                );
                                                                $attendanceLogin = App\Models\AttendanceLogin::where([
                                                                    ['attendance_id', $item->id],
                                                                    ['course_id', $course->id],
                                                                ])->count();
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
                                                                        ->whereBetween('created_at', [
                                                                            $startDate,
                                                                            $endDate,
                                                                        ])
                                                                        ->where('course_id', $course->id)
                                                                        ->first();
                                                                @endphp
                                                                @if ($log)
                                                                    <span class="dropdown-item text-success"> اليوم
                                                                        {{ $day }} (حاضر)</span>
                                                                    <button
                                                                        class=" btn btn-warning-gradient btn-with-icon mr-1"
                                                                        type="button"
                                                                        onclick="Delattend({{ $item->id }},{{ $course->id }},{{ $day }})">حذف
                                                                        حضور</button>
                                                                @else
                                                                    <span class="dropdown-item text-danger"> اليوم
                                                                        {{ $day }}
                                                                        (غير حاضر)
                                                                    </span>
                                                                    <button
                                                                        class=" btn btn-warning-gradient btn-with-icon mr-1"
                                                                        type="button"
                                                                        onclick="attend({{ $item->id }},{{ $course->id }},{{ $day }})">تسجيل
                                                                        حضور</button>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </td>
                                                @endif

                                                <td>
                                                    @if ($attendanceLogin != 0)
                                                        {{ intval(($attendanceLogin / $course->duration) * 100) }}%
                                                    @else
                                                        0%
                                                    @endif
                                                </td>
                                                @php
                                                $rate = App\Models\RateAttendance::where([
                                                           ['attendance_id', $item->id]
                                                       ])->avg('rate');
                                                 @endphp
                                       <td>{{ number_format($rate, 1) }}
                                       </td>
                                                @if ($id)
                                                    @if ($course->program->theme_name == 'A1')
                                                        <td><a href="{{ route('invitation.index', [$item->id, 'course_id' => $course->id]) }}"
                                                                target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
                                                    @elseif($course->program->theme_name == 'A2')
                                                        <td><a href="{{ route('invitationV2.index', [$item->id, 'course_id' => $course->id]) }}"
                                                                target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
                                                    @else
                                                        <td><a href="{{ route('invitation.index', [$item->id, 'course_id' => $course->id]) }}"
                                                                target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
                                                    @endif
                                                @endif



                                                <td>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                            <input type="checkbox" class="toggle-switch"
                                                                onclick="toogle({{ $item->id }},this)"
                                                                data-toggle="toggle" data-on="yes" data-off="no"
                                                                id="{{ $item->id }}"
                                                                @if ($item->status == 'active') checked="checked" value="active" @else value="deactive" @endif>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="d-flex filter-col-cell">
                                                    <!-- dropdown-menu -->
                                                    <button data-toggle="dropdown"
                                                        class="btn btn-previous btn-sm btn-block"><i
                                                            class="si si-options-vertical text-gray tx-13"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item"
                                                            data-target="#modaledit_{{ $item->id }}"
                                                            data-toggle="modal"> تحرير </a>


                                                        <button class="dropdown-item"
                                                            onclick="performDestroy({{ $item->id }} , this)"> حذف
                                                        </button>

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
            </div>
        </div>
        <!-- table -->


        <!--open filter bottom  -->
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <ul class="pagination mb-0">
                        {!! $attendance->links() !!}
                    </ul>


                </div>
            </div>
        </div>
        <!--closed filter bottom  -->
    </div>
    <div class="modal" id="choseAttendType">
        <div class="modal-dialog " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title"> اضافة مشارك </h5><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="">

                    <div class="modal-footer border-0">
                        <button class="btn btn-outline-light btn-with-icon btn-sm mr-1" data-dismiss="modal"
                            data-target="#excel_file" data-toggle="modal" type="button"> رفع ملف <i
                                class="bi bi-floppy"></i></button>
                        <button class="btn btn-outline-light btn-with-icon btn-sm mr-1" data-dismiss="modal"
                            data-target="#modaladd" data-toggle="modal" type="button"> اضافه مشترك<i
                                class="bi bi-floppy"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="excel_file">
        <div class="modal-dialog " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title"> اضافة مشارك </h5><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <label for="example"> الملف </label>
                                <input type="file" class="form-control" required="" id="excel_file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button"
                            onclick="performStoreExcel({{ $id }})"> حفظ <i class="bi bi-floppy"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="modaladd">
        <div class="modal-dialog " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title"> اضافة مشارك </h5><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="example"> الأسم </label>
                                <input class="form-control" required="" id="name" type="text">
                            </div>
                            <div class="col-6 mt-4">
                                <label for="example"> رقم الهاتف </label>
                                <input class="form-control" required="" id="phone_number" type="number">
                            </div>
                            <div class="col-6 mt-4">
                                <label for="example"> الرقم الوظيفي </label>
                                <input class="form-control" required="" id="id_number" type="number">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> المهنة </label>
                                <input class="form-control" required="" id="job" type="text">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> جهة العمل </label>
                                <input class="form-control" required="" id="work_place" type="text">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="example"> السجل المدني</label>
                                <input class="form-control" required="" id="civil_registry" type="text">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button"
                            onclick="performStore({{ $id }})"> حفظ <i class="bi bi-floppy"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End add modal -->


    <!-- add modal -->
    @foreach ($attendance as $item)
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
                                    <input class="form-control" value="{{ $item->work_place }}"required=""
                                        id="work_place_{{ $item->id }}" type="text">
                                </div>
                                <div class="col-12 mt-4">
                                    <label for="example"> السجل المدني</label>
                                    <input class="form-control" value="{{ $item->civil_registry }}" required=""
                                        id="civil_registry_{{ $item->id }}" type="text">
                                </div>
                                @if ($course)
                                    <input class="form-control" value="{{ $course->id }}"required="" hidden
                                        id="course_id" type="text">
                                @endif
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
    <!-- End add modal -->

    <!-- delete modal -->
    <div class="modal" id="modalDelete">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h5 class="modal-title"> حذف مشارك </h5><button aria-label="Close" class="close"
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
    @if ($course)
        @foreach ($attendance as $item)
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
                                $q = App\Models\Quiz::find($quiz->quiz_id);
                            } else {
                                $responseAnswersTrue = 0;
                                $q = null;
                            }

                            if ($responseAnswersTrue != 0) {
                                $total = ($responseAnswersTrue / $questions->count()) * 100;
                            } else {
                                $total = 0;
                            }
                        @endphp
                        <p class="wrapper">
                            <b> الأختبار</b>
                        <h3> <b class="text-center"> {{ $q->name ?? '' }} </b>
                        </h3>
                        </p>
                        <p class="wrapper">
                            <b>نتيجة الأختبار</b>
                        <h3> <b class="text-center"> {{ $total }} %</b>
                        </h3>
                        </p>

                    </div>
                    <div class="list p-3">
                        <div class="row row-sm">
                            <div class="col-6">
                                @if ($course)
                                    <a class="card text-center"
                                        href="{{ route('attendance.summery', [$id, $item->id]) }}">
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
                                <a href="{{ route('quiz.xlsx', [$id, $item->id]) }}">


                                    <div class="card text-center">
                                        <div class="card-body p-2">
                                            <div class="feature widget-2 text-center mt-0 mb-3">
                                                <i
                                                    class="icon ion-md-paper project bg-warning-transparent mx-auto text-warning "></i>
                                            </div>
                                            <p class="mb-1 text-muted tx-13"> تحميل نموذج الاجابات </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i
                                            class="bi bi-pencil-fill  project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> الأختبار القبلي </p>
                                </div>
                            </div>
                        </div> --}}
                            {{-- <div class="col-6">
                            <a class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">

                                        <i
                                            class="icon ion-md-paper-plane project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> استلام الاختبار </p>
                                </div>
                            </a>
                        </div> --}}
                        </div>
                    </div>
                    {{-- <div class="list p-3 w-100">
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h6 class=""> الحالة </h6>
                        <p> تم التقدم </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h6 class=""> تاريخ التقدم </h6>
                        <p> 12 اكتوبر 23 </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h6 class=""> الوقت </h6>
                        <p> 12:23 </p>
                    </div>
                </div> --}}
                </div>
            </div>
        @endforeach
    @endif
    <!--/Sidebar-right-->

    <!--  بعدي-->
    <!-- Begin Side Drawer after -->
    @if ($course)
        @foreach ($attendance as $item)
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
                                $q = App\Models\Quiz::find($quiz->quiz_id);
                            } else {
                                $q = null;

                                $responseAnswersTrue = 0;
                            }

                            if ($responseAnswersTrue != 0) {
                                $total = ($responseAnswersTrue / $questions->count()) * 100;
                            } else {
                                $total = 0;
                            }
                        @endphp
                        <p class="wrapper">
                            <b> الأختبار</b>
                        <h3> <b class="text-center"> {{ $q->name ?? '' }} </b>
                        </h3>
                        </p>
                        <p class="wrapper">
                        <h3> <b class="text-center"> {{ $total }} %</b> </h3>
                        </p>
                    </div>


                    <div class="list p-3">
                        <div class="row row-sm">
                            <div class="col-6">
                                @if ($course)
                                    <a class="card text-center"
                                        href="{{ route('attendance.summery.after', [$id, $item->id]) }}">
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
                                <a href="{{ route('quiz.after.xlsx', [$id, $item->id]) }}">
                                    <div class="card text-center">
                                        <div class="card-body p-2">
                                            <div class="feature widget-2 text-center mt-0 mb-3">
                                                <i
                                                    class="icon ion-md-paper project bg-warning-transparent mx-auto text-warning "></i>
                                            </div>
                                            <p class="mb-1 text-muted tx-13"> تحميل نموذج الاجابات </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="col-6">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i
                                            class="bi bi-box-arrow-in-down project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted tx-13"> تحميل ملف التكليف </p>
                                </div>
                            </div>
                        </div> --}}
                            {{-- <div class="col-12">
                            <div class="card text-center">
                                <div class="card-body p-2">
                                    <div class="feature widget-2 text-center mt-0 mb-3">
                                        <i class="bi bi-send  project bg-warning-transparent mx-auto text-warning "></i>
                                    </div>
                                    <p class="mb-1 text-muted"> استلام التكليف </p>
                                </div>
                            </div>
                        </div> --}}

                        </div>
                    </div>
                    {{-- <div class="list p-3 w-100">
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h6 class=""> الحالة </h6>
                        <p> تم التقدم </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h6 class=""> تاريخ التقدم </h6>
                        <p> 12 اكتوبر 23 </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <h6 class=""> الوقت </h6>
                        <p> 12:23 </p>
                    </div>
                </div> --}}
                </div>
            </div>
        @endforeach
    @endif
    <div class="modal" id="sendSms">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">

                <form action="">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 form-group">
                                <label for="example"> رساله </label>
                                <textarea class="form-control" required="" id="massege_select" type="text"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon " type="button"
                            onclick="performStoreSms({{ $id }})"> حفظ <i class="bi bi-floppy"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="sendSmsSelected">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <form action="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="example"> رساله </label>
                                <!-- Corrected the ID attribute to match the jQuery selector -->
                                <textarea class="form-control" required="" id="massege" name="massege" type="text"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon send_all" type="button"
                            data-url="{{ url('/dashboard/admin/attendance-sms/selected') }}"> حفظ <i
                                class="bi bi-floppy"></i></button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

        window.openSideDrawer = openSideDrawer;
        window.closeSideDrawer = closeSideDrawer;

        function performStore(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('work_place', document.getElementById('work_place').value);
            formData.append('id_number', document.getElementById('id_number').value);
            formData.append('job', document.getElementById('job').value);
            formData.append('civil_registry', document.getElementById('civil_registry').value);

            formData.append('course_id', id);

            storepart('/dashboard/admin/attendance', formData)
        }

        function performStoreExcel(id) {
            let formData = new FormData();
            formData.append('excel_file', document.getElementById('excel_file').files[0]);
            storepart('/dashboard/admin/attendance/upload-excel/' + id, formData)
        }

        function performStoreSms(id) {
            let formData = new FormData();
            formData.append('massege', document.getElementById('massege_select').value);
            formData.append('course_id', id);

            storepart('/dashboard/admin/attendance-sms', formData)
        }



        $(document).ready(function() {
            // Unbind the click event before binding it again to prevent multiple bindings
            $('#master').off('click').on('click', function(e) {
                if ($(this).is(':checked')) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            // Unbind the click event before binding it again to prevent multiple bindings
            $('.send_all').off('click').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var join_selected_values = allVals.join(",");
                    // Corrected the typo in the next line
                    var join_selected_message = document.getElementById('massege').value;
                    console.log(join_selected_message);

                    var courseId = document.getElementById('course_id').value;


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // Corrected the data parameter to send the message
                        data: {
                            ids: join_selected_values,
                            massege_select: join_selected_message,
                            course_id: courseId
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '  successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            });
        });


        function performUpdate(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', document.getElementById('name_' + id).value);
            formData.append('phone_number', document.getElementById('phone_number_' + id).value);
            formData.append('work_place', document.getElementById('work_place_' + id).value);
            formData.append('id_number', document.getElementById('id_number_' + id).value);
            formData.append('job', document.getElementById('job_' + id).value);
            formData.append('certficate', document.getElementById('certficate_' + id).files[0]);

            formData.append('civil_registry', document.getElementById('civil_registry_' + id).value);

            formData.append('course_id', document.getElementById('course_id').value);
            storepart('/dashboard/admin/attendance/' + id, formData)
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
    </script>

    <script>
        function performDestroy(id, reference) {

            let url = '/dashboard/admin/attendance/' + id;

            confirmDestroy(url, reference);
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function toogle(id, tog) {

            var id = id;
            var unit_toggle_value = tog.value;
            if (unit_toggle_value == "active") {
                unit_toggle_value = "deactive";
            } else {
                unit_toggle_value = 'active';
            }
            $.ajax({
                url: "{{ route('attendance.status') }}",
                type: "POST",
                cache: false,
                data: {
                    id: id,
                    unit_toggle_value: unit_toggle_value,
                },
                dataType: "json",
                success: function(response) {

                }
            });
        }
    </script>
@endsection
