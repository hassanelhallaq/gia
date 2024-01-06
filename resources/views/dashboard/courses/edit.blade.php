@extends('dashboard.layouts.master')
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0" >
    <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="../index.html" class="text-muted">الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    <a  >البرامج</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#"> {{$course->name}}</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">
        <div class=" d-flex">
            <a href="members.html"  class="btn btn-previous text-warning" disabled><i class="mdi mdi-account-outline "></i> المشاركين </a>
            <a href="programme_detales.html"  class="btn btn-previous text-warning" disabled><i class="ti-angle-double-right"></i> السابق </a>
        </div>
    </div>
</div>
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body" id="cartprogramme">
                    <!-- form opend -->
                    <form role="form" action="" method="post" class="f1">
                        <!--open one pag    -->
                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <label for="example"> أسم الدورة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" id="name" value="{{$course->name}}" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> المقاعد </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" id="seat_count" value="{{$course->seat_count}}" id="seat_count" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <label for="example"> الفئة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="example"> هل يوجد إختبار </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="is_exam"  type="text" value="{{$course->is_exam == 'yes' ? "نعم" : "لا"}}" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> يبدأ في </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="start"  type="text" value="{{$course->start}}" id="start" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> هل يوجد شهادة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="is_certificate"  type="text" value="{{$course->is_certificate == 'yes' ? "نعم" : "لا"}}" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="example"> أسم المدرب </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> نسبة الحصول على الشهادة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="percentage_certificate"  type="text" value="{{$course->percentage_certificate}}" id="percentage_certificate"  readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> أسم المنسق </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="coordinator" type="text" value="{{$course->coordinator}}" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> الاختبار القبلي </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                            <p class="ml-1"> تحرير </p>
                                            <i class="bi bi-pen edit-button ml-2"></i>
                                            <p class="ml-3 "> البحث عن اختبار </p>
                                            <i class="bi bi-box-arrow-in-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> المستوى </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="level"  type="text" value="{{$course->level}}" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> الأختبار البعدي </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                            <p class="ml-1"> تحرير </p>
                                            <i class="bi bi-pen edit-button ml-2"></i>
                                            <p class="ml-3 "> البحث عن اختبار </p>
                                            <i class="bi bi-box-arrow-in-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> لغة الدورة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="language" type="text" value="{{$course->language == 'arabic' ? "عربي" : "انجليزي"}}" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> المادة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="subject"  type="text" value="{{$course->subject}}" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحميل المادة </p>
                                          <i class="bi bi-box-arrow-in-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> تسجيل الحضور </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحرير </p>
                                          <i class="bi bi-pen edit-button" ></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> Assignment </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" id="assignment" value="{{$course->assignment}}" value="another value" readonly></input>
                                        <div class="d-flex ml-2">
                                          <p class="ml-3"> تحميل Assignment </p>
                                          <i class="bi bi-box-arrow-in-down"></i>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- closed row -->
                            <br>
                            <div class="f1-buttons d-flex justify-content-between mt-5">
                                <div class="d-flex">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-sm"> حفظ الاعدادات  <i class="bi bi-floppy"></i></button>
                                    <a class="btn btn-outline-light btn-with-icon btn-sm mr-1 " id="copyButton"> استنساخ البرنامج <i class="far fa-clone" ></i></a>
                                </div>
                                <a class="btn btn-danger btn-with-icon btn-sm ">  حذف الدورة <i class="bi bi-trash3"></i></a>
                            </div>
                    </form>
                    <!-- closed form -->
                </div>
            </div>
        </div>
    </div>
    <!-- closed row -->


@endsection
@section('js')
<script>
    function performStore() {
        let formData = new FormData();
        formData.append("_method", "PUT")

        formData.append('course_name', document.getElementById('name').value);
        formData.append('language', document.getElementById('language').value);
        formData.append('seat_count', document.getElementById('seat_count').value);
        formData.append('coruse_start', document.getElementById('start').value);
        formData.append('is_exam', document.getElementById('is_exam').value);
         formData.append('is_certificate', document.getElementById('is_certificate').value);
        formData.append('trainer', document.getElementById('trainer').value);
        formData.append('percentage_certificate', document.getElementById('percentage_certificate').value);
         formData.append('coordinator', document.getElementById('coordinator').value);
        formData.append('category_id', document.getElementById('category_id').value);
        formData.append('level', document.getElementById('level').value);
        formData.append('subject', document.getElementById('subject').value);
        formData.append('assignment', document.getElementById('assignment').files[0]);


        storeRoute('/dashboard/admin/courses/'+id, formData)


    }
</script>
<script src="{{asset('assets/plugins/select_mul/js/semantic.min.js')}}"></script>
<script src="{{asset('assets/plugins/select_mul/js/main.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection
