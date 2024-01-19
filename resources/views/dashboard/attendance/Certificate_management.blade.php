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
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="table_program_management.html"class="text-muted">اسم الدورة</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="table_program_management.html"class="text-muted"> اسم الاختبار </a>
                    </li>
                    {{-- <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> برنامج تطوير المهارات الشخصية </a>
                </li> --}}
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            <div class=" d-flex">
                <a href="{{ route('course.xlsx') }}"
                class="btn btn-outline-light btn-with-icon btn-sm mr-1 btn-export mb-1"> تصدير <i
                    class="ti-stats-up project"></i></a>
                <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1" data-target="#sendSms" data-toggle="modal">  ارسال  الشهادة <i class="icon ion-md-paper-plane"></i></button>
                <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1" data-target="#select2modal"data-toggle="modal"> رفع من قالب </button>
                <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1" data-target="#select2modal"data-toggle="modal"> اضافة مشارك <i class="bi bi-plus"></i></button>

            </div>
        </div>
    </div>
@endsection
@section('content')
    <!--open filter Top  -->
    <div class="col-lg-12">
        <div class="card mg-b-20">
            <div class="card-body d-flex p-3">
                <div class="form">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control form-input" id="search-table"
                        placeholder="بحث">
                    <span class="right-pan"><i class="bi bi-sliders"></i></span>
                </div>

                <div class="d-flex">
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
                </div>

                <button class="btn btn-danger btn-sm btn-with-icon mr-1 text-white btnSelectDelete"data-target="#modalDelete" data-toggle="modal" style="display: none;">حذف الصفوف المختارة <i class="bi bi-trash tx-12"></i></button>

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
               <div class="table-responsive">
                   <table class="table table-striped mg-b-0 text-md-nowrap">
                       <thead>
                           <tr class="">
                               <th><input type="checkbox" class="checkParent"></th>
                               <th>#</th>
                               <th> اسم المشارك </th>
                               <th> رقم الهاتف</th>
                               <th> نسبة الأجتياز </th>
                               <th>  نموذج الشهادة </th>
                               <th> تقييم الحدث </th>
                               <th> نوع الشهادة </th>
                               <th> اختبار القبلي </th>
                               <th> اختبار البعدي </th>
                               <th> نسخ رابط الشهادة </th>
                               <th> رمز الشهادة </th>
                               <th> الحالة </th>
                               <th> رفع الشهادة </th>

                               <!-- Filter -->

                           </tr>
                       </thead>
                       <tbody id="table-body">
                           <tr>
                               <p class="p-5 text-center d-none" id="empty-message">لا توجد   بيانات لعرضها</p>
                           </tr>
                           <tr class="table-rows">
                               <td><input type="checkbox" class="checkChild"></td>
                               <td>1</td>
                               <td scope="row"> ----- </td>
                               <td>3</td>
                               <td> -------- </td>
                               <td> --- </td>
                               <td> --- </td>
                               <td> --- </td>
                               <td> --- </td>
                               <td> --- </td>
                               <td> --- </td>
                               <td> --- </td>
                               <td> --- </td>
                               {{-- <button class="btn btn-secondary btn-sm btn-light-icon mr-2 p-1" data-target="#select2modal" data-toggle="modal"> اضافة ملف <i class="bi bi-plus-circle"></i></button> --}}

                                <td>

                                    <a href="../index.html" class="btn btn-previous text-warning btn-with-icon" data-target="#select2modal" data-toggle="modal"> تحميل <i class="bi bi-arrow-down tx-18"></i></a>
                                    @include('dashboard.attendance.model_add_file')
                                </td>


                               <td class="d-flex filter-col-cell">
                                   <!-- dropdown-menu -->
                                   <button data-toggle="dropdown"class="btn btn-previous btn-sm">
                                    <i class="si si-options-vertical text-gray tx-12"></i></button>
                                   <div class="dropdown-menu">
                                       <a href="edit_course.html" class="dropdown-item"> تحرير </a>
                                       <a href="" class="dropdown-item"data-target="#modalDelete" data-toggle="modal"> حذف </a>
                                   </div>
                               </td>
                           </tr>
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
                    <li class="page-item"><button class="btn btn-previous" id="table-paganite-next"><i class="ti-angle-double-right"></i></button></li>
                    <li class="page-item m-2" id="table-pages">1/10</li>
                    <li class="page-item"><button class="btn btn-previous"  id="table-paganite-prev"><i class="ti-angle-double-left"></i></button>
                    </li>
                </ul>
                <div class="d-flex">
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
                </div>
                <div class="mr-auto tx-15 mt-2">
                    <span id="table-status">1-6 of 100</span>
                </div>
            </div>
        </div>
    </div>
    <!--closed filter bottom  -->

@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>



@endsection
