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
                    </li>
                    @if ($program)
                        <li class="breadcrumb-item">
                            <a class="text-muted"> برنامج {{ $program->name }} </a>
                        </li>
                    @endif
                </ol>
            </nav>
        </div>
        @if (!Auth::guard('trainer')->check())
            <div class="main-dashboard-header-right ">
                <div class=" d-flex flex-wrap">
                    <a href="{{ route('course.xlsx') }}"
                        class="btn btn-outline-light btn-with-icon btn-sm mr-1 btn-export mb-1"> تصدير <i
                            class="ti-stats-up project"></i></a>
                    <button class="btn btn-outline-light btn-with-icon mr-1 mb-1"> اعدادات صفحة الويب <i
                            class="icon ion-ios-settings"></i></button>
                    @if ($program)
                        <a href="{{ route('programs.edit', [$program->id]) }}"
                            class="btn btn-outline-light btn-with-icon mr-1 mb-1"> اعدادات <i
                                class="icon ion-ios-settings"></i></a>
                    @endif
                    @if ($id)
                        @can('اضافه دوره')
                            <a href="{{ route('program.course.create', [$id]) }}"
                                class="btn btn-warning-gradient btn-with-icon mr-1 mb-1"> اضافة دورة جديدة <i
                                    class="bi bi-plus"></i></a>
                        @endcan
                    @else
                        @can('اضافه دوره')
                            <a href="{{ route('courses.create') }}" class="btn btn-warning-gradient btn-with-icon mr-1 mb-1">
                                اضافة
                                دورة جديدة <i class="bi bi-plus"></i></a>
                        @endcan
                    @endif
                    @if ($program)
                        <a href="{{ route('home', [$program->username]) }}"
                            class="btn btn-warning-gradient btn-with-icon mr-1 mb-1" target=”_blank> عرض صفحة الويب <i
                                class="icon ion-ios-share-alt"></i></a>
                    @endif
                </div>
            </div>
        @endif
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
    <div class="row">

        <div class="row  sales-cardSmall totalNumberPrograms">
            <div class="col-lg-3 col-sm-12">
                <div class="snip1191 orange pos-relative">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample69.jpg" alt="sample69"
                        style="border-radius: 10px;" />
                    <a class="pos-absolute l-30 t-20 text-white "> فريق ادارة المشاريع </a>
                    <a class="btn btn-warning-light pos-absolute l-20 text-white b-10"
                        href="{{ route('program.mangers', [$program->id]) }}">تحرير القائمة </a>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body  iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="typcn typcn-book text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted">عدد الدورات </p>
                                            <div class="">
                                                <h6 class="mb-1 font-weight-bold">{{ $program->courses->count() }}</h6>
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
                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="typcn typcn-book text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> الدورات الفعالة </p>
                                            <div class="">
                                                <h6 class="mb-1 font-weight-bold">
                                                    {{ $program->courses->where('status', 'active')->count() }}</h6>
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
                    @php
                        $countActiveItems = 0; // Counter for active items
                        $countPastItems = 0;
                        foreach ($courses as $i => $item) {
                            $start = Carbon\Carbon::parse($item->start)->format('y-m-d');
                            $courseStartDate = \Carbon\Carbon::parse($item->start);

                            $end = $courseStartDate->addDays($item->duration)->startOfDay();
                            $today = Carbon\Carbon::today()->format('Y-m-d');
                            $status = Carbon\Carbon::parse($today)->gt($end) ? 'منتهيه' : 'غير منتهيه';

                            // Check if the item is active and end date is in the future
                            if ($status == 'غير منتهيه') {
                                $countActiveItems++;
                            }
                            if (Carbon\Carbon::parse($today)->gt($end)) {
                                $countPastItems++;
                            }
                        }

                    @endphp
                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="si si-layers text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> الدورات المجدولة</p>
                                            <div class="">
                                                <h6 class="mb-1 font-weight-bold">
                                                    {{ $countActiveItems }}</h6>
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
                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="si si-layers text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> الدورات المنتهية </p>
                                            <div class="">
                                                <h6 class="mb-1 font-weight-bold">{{ $countPastItems }}</h6>
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
                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="typcn typcn-group-outline text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> اجمالي المشاركين </p>
                                            <div class="">
                                                @php
                                                    $totalAttendanceCount = 0; // Initialize total attendance count
                                                    $totalAttendanceCountAccepted = 0; // Initialize total attendance Accepted count
                                                    $totalAttendanceCountRejected = 0; // Initialize total attendance Rejected count
                                                    $totalBef = 0;
                                                    $totalAfter = 0;

                                                    foreach ($courses as $i => $item) {
                                                        $count = $item->attendances->count();
                                                        $countAccepted = $item->attendances
                                                            ->where('is_accepted', 1)
                                                            ->count();
                                                        $countRejected = $item->attendances
                                                            ->where('is_accepted', 0)
                                                            ->count();
                                                        $totalAttendanceCount += $count; // Accumulate the count for each item
                                                        $totalAttendanceCountAccepted += $countAccepted; // Accumulate the count for each item
                                                        $totalAttendanceCountRejected += $countRejected; // Accumulate the count for each item
                                                    }
                                                @endphp
                                                <h6 class="mb-1 ">{{ $totalAttendanceCount }}</h6>
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

                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="typcn typcn-group-outline text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> نسبة التحسين العامة </p>
                                            <div class="">
                                                <h6 class="mb-1 ">500</h6>
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

                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="typcn typcn-group-outline text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> عدد الدورات المقبولة </p>
                                            <div class="">
                                                <h6 class="mb-1 ">{{ $totalAttendanceCountAccepted }}</h6>
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

                    <div class="col-lg-3 col-sm-6">
                        <div class="col-xl-part w-100">
                            <div class="card">
                                <div class="card-body iconfont text-right d-flex justify-content-between p-2">
                                    <div class="d-flex mb-0">
                                        <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                            <i class="typcn typcn-group-outline text-warning tx-24"></i>
                                        </div>
                                        <div class="">
                                            <p class="mb-2 tx-12 text-muted"> عدد حالات الاعتذار </p>
                                            <div class="">
                                                <h6 class="mb-1 ">{{ $totalAttendanceCountRejected }}</h6>
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

                </div>
            </div>

        </div>

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

                    {{-- <div class="mr-auto d-block tx-20">
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
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr class="tableHead">
                                    <th><input type="checkbox" class="checkParent"></th>
                                    <th>#</th>
                                    <th>
                                        اسم الدورة
                                    </th>
                                    <th>الفئة</th>
                                    <th> اسم المدرب</th>
                                    <th> المستوى </th>
                                    <th> تاريخ البداية </th>
                                    <th>المدة </th>
                                    <th>لغة الدورة</th>
                                    <th>الحاله</th>

                                    <th> عدد المسجلين </th>
                                    <th> اسم المنسق </th>
                                    <th> شهادة </th>
                                    <th> نسبة الشهادة </th>
                                    {{-- <th> المقاعد المتاحة </th> --}}
                                    <th> الاختبار القبلي </th>
                                    <th> الاختبار البعدي </th>
                                    {{-- <th> تحميل المادة </th>
                                        <th> AS </th> --}}


                                    <!-- Filter -->
                                    <td class="col-filter">
                                        <!-- dropdown-menu -->
                                        <button data-toggle="dropdown" class="btn btn-previous p-0"><i
                                                class="bi bi-filter-square tx-20"></i></button>
                                        <div class="dropdown-menu scrollable-menu" role="menu">
                                        </div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr>
                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها</p>
                                </tr>
                                @foreach ($courses as $i => $item)
                                    <tr class="table-rows">
                                        <td><input type="checkbox" class="checkChild"></td>
                                        <td>{{ $i + 1 }}</td>
                                        <td scope="row">{{ $item->name }}</td>
                                        <td>{{ $item->category_id }}</td>
                                        <td class="client-name"> {{ $item->trainer->name ?? '' }}</td>
                                        <td> {{ $item->level ?? '' }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td>{{ $item->duration }}ايام</td>
                                        <td>
                                            @if ($item->language == 'arabic')
                                                عربي
                                            @else
                                                انجليزيه
                                            @endif
                                        </td>
                                        @php
                                            $start = Carbon\Carbon::parse($item->start)->format('y-m-d');
                                            $courseStartDate = \Carbon\Carbon::parse($item->start);

                                            $end = $courseStartDate->addDays($item->duration)->startOfDay();
                                            $today = Carbon\Carbon::today()->format('Y-m-d');
                                            $status = Carbon\Carbon::parse($today)->gt($end) ? 'منتهيه' : 'غير منتهيه';

                                        @endphp
                                        <td>
                                            @if (Carbon\Carbon::parse($today)->gt(Carbon\Carbon::parse($start)) && $item->status != 'active')
                                                <span
                                                    class="tag tag-rounded bg-primary-transparent text-primary">متآخره</span>
                                            @elseif (Carbon\Carbon::parse($start)->gt(Carbon\Carbon::parse($today)))
                                                <span
                                                    class="tag tag-rounded bg-primary-transparent text-primary">مجدوله</span>
                                            @elseif($item->status == 'active' && !Carbon\Carbon::parse($today)->gt($end))
                                                <span
                                                    class="tag tag-rounded bg-primary-transparent text-primary">فعال</span>
                                            @elseif (Carbon\Carbon::parse($today)->gt($end))
                                                <span
                                                    class="tag tag-rounded bg-primary-transparent text-primary">منتهيه</span>
                                            @elseif($item->status == 'Inactive')
                                                <span class="tag tag-rounded bg-primary-transparent text-primary">غير
                                                    فعال</span>
                                            @endif
                                        </td>
                                        <th> # </th>
                                        <th>{{ $item->coordinator }} </th>
                                        <th>{{ $item->is_certificate == 1 ? 'نعم' : 'لا' }}</th>
                                        <th>{{ $item->percentage_certificate }} </th>
                                        <th>{{ $item->quizes->where('type', 'befor')->first()->name ?? '' }} </th>
                                        <th>{{ $item->quizes->where('type', 'after')->first()->name ?? '' }} </th>
                                        {{-- <th> # </th>
                                        <th> # </th> --}}
                                        <td class="d-flex filter-col-cell">
                                            <a href="{{ route('courses.show', [$item->id]) }}"><i
                                                    class="far fa-eye text-gray tx-13 ml-4"></i></i></a>
                                            <!-- dropdown-menu -->
                                            <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i
                                                    class="si si-options-vertical text-gray tx-12"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('courses.edit', [$item->id]) }}" class="dropdown-item">
                                                    تحرير </a>
                                                <a href="{{ route('drepIn.quiz', [$item->id]) }}" class="dropdown-item">
                                                    الاختبارات </a>
                                                <button class="dropdown-item"
                                                    onclick="performDestroy({{ $item->id }} , this)"> حذف </button>
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
                        {!! $courses->links() !!}

                    </ul>


                </div>
            </div>
        </div>
        <!--closed filter bottom  -->
    </div>
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
    <script src="{{ asset('assets/js/table.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
