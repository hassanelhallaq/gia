@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0"
      >
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('programs.index')}}" class="text-muted">البرامج</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('program.course',[$course->program->id])}}" class="text-muted"> برنامج {{$course->program->name}} </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> المشتركين </a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            <div class="d-flex flex-wrap">
                <button class="btn btn-outline-light btn-with-icon btn-sm mr-1"data-target="#modaladd" data-toggle="modal">
                    اضافة مشاركين جدد <i class="bi bi-plus"></i></button>
                <button class="btn btn-outline-light btn-with-icon btn-sm mr-1"> تحميل تقرير المشاركين <i
                        class="bi bi-box-arrow-in-down"></i></i></button>
                <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1"> ارسال دعوة جماعية <i
                        class="icon ion-md-paper-plane"></i></button>
                <a href="../index.html" class="btn btn-previous btn-sm text-warning mt-2"><i
                        class="ti-angle-double-right"></i> العودة </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- main-header opened -->
    <link href="{{ asset('assets/css/drawar-user.css') }}" rel="stylesheet">

    <!-- /main-header -->


    <!-- container opened -->
    <!-- row -->
    <div class="row">

        <!--open filter Top  -->
        <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" id="search-table" placeholder="بحث">
                        <span class="right-pan"><i class="bi bi-sliders"></i></span>
                    </div>

                    <button class="btn btn-danger mr-1 text-white btnSelectDelete" data-target="#modalDelete"
                        data-toggle="modal" style="display: none;">حذف الصفوف المختارة <i
                            class="bi bi-trash tx-12"></i></button>
                    <div class="mr-auto d-block tx-20">
                        <a href=""><i class="typcn typcn-calendar-outline"></i></a>
                        <a href=""><i class="bi bi-grid"></i></a>
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
                                        <tr>
                                            <th>
                                                الأسم
                                            </th>
                                            <th>جهة العمل</th>
                                            <th> رقم الهاتف </th>
                                            <th> الرقم الوظيفي </th>
                                            <th> المهنة </th>
                                            <th> الاختبارات </th>
                                            <th> الاكتمال </th>
                                            @if ($id)
                                                <th> الدعوه </th>
                                            @endif

                                            <!-- Filter -->
                                            <th>
                                                <div class="dropdown">
                                                    <i aria-expanded="false" aria-haspopup="true"
                                                        class="bi bi-filter-square tx-20"data-toggle="dropdown"
                                                        id="dropdownMenuButton" type="button"></i></i>
                                                    <div class="dropdown-menu tx-13">
                                                        <p class="dropdown-item" href="#"><label class="ckbox"><input
                                                                    type="checkbox"><span>Checkbox
                                                                    Unchecked</span></label></p>
                                                        <p class="dropdown-item" href="#"><label class="ckbox"><input
                                                                    type="checkbox"><span>Checkbox
                                                                    Unchecked</span></label></p>
                                                        <p class="dropdown-item" href="#"><label class="ckbox"><input
                                                                    type="checkbox"><span>Checkbox
                                                                    Unchecked</span></label></p>
                                                        <p class="dropdown-item" href="#"><label class="ckbox"><input
                                                                    type="checkbox"><span>Checkbox
                                                                    Unchecked</span></label></p>
                                                    </div>
                                                </div>
                                            </th>
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
                                                <td scope="row"> {{ $item->name }} </td>
                                                <td>{{ $item->work_place }} </td>
                                                <td class="client-name"> {{ $item->phone_number }} </td>
                                                <td>{{ $item->id_number }} </td>
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
                                                <td> 60% </td>
                                                @if ($id)
                                                    <td><a href="{{ route('invitation.index', [$item->id, 'course_id' => $id]) }}"
                                                            target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
                                                @endif
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
    @foreach ($attendance as $item)
        <div class="offcanvas offcanvas-start bg-light" data-bs-scroll="true" tabindex="-1"
            id="drawerbefore_{{ $item->id }}" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-body d-flex align-items-start flex-column mb-3 justify-content-between bg-light p-0">
                <div class="list m-auto text-center">
                    <i class="bi bi-person-circle tx-80"></i>
                    <p class="wrapper">
                        <b class="text-center"> {{ $item->name }}</b>
                    </p>
                </div>
                <div class="list p-3">
                    <div class="row row-sm">
                        <div class="col-6">
                            <a class="card text-center" href="View_test_results.html">
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
                <div class="list p-3 w-100">
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
                </div>
            </div>
        </div>
    @endforeach
    <!--/Sidebar-right-->

    <!--  بعدي-->
    <!-- Begin Side Drawer after -->
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
                </div>
                <div class="list p-3">
                    <div class="row row-sm">
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
                <div class="list p-3 w-100">
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
                </div>
            </div>
        </div>
    @endforeach
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
            formData.append('course_id', id);
            storepart('/dashboard/admin/attendance', formData)
        }

        function performUpdate(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', document.getElementById('name_' + id).value);
            formData.append('phone_number', document.getElementById('phone_number_' + id).value);
            formData.append('work_place', document.getElementById('work_place_' + id).value);
            formData.append('id_number', document.getElementById('id_number_' + id).value);
            formData.append('job', document.getElementById('job_' + id).value);
            storepart('/dashboard/admin/attendance/' + id, formData)
        }
    </script>
@endsection
