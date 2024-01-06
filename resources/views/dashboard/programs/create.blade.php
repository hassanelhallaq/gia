@extends('dashboard.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
    <!--Internal  Datetimepicker-slider css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}">
    <!-- Internal Spectrum-colorpicker css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/wizards/css/form-elements.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/wizards/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select_mul/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select_mul/css/semantic.min.css') }}">
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- form opend -->
                    <form role="form" action="" method="post" class="f1">
                        <!--open one pag    -->
                        <fieldset>
                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <label for="exampleInputEmail1">اسم البرنامج</label>
                                        <input class="form-control" required="" id="name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="exampleInputEmail1">محتوي 1 </label>
                                    <input class="form-control" required="" id="content_one" type="text">
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">اسم العميل</label>
                                    <select id="client_id" class="form-control select2">
                                    @foreach ($clients as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                                </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">اسم المستخدم</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="mdi mdi-account-search"></i></span>
                                        </div><input aria-describedby="basic-addon1" aria-label="Username" id="username"
                                            class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10">محتوي 2</p>
                                    <textarea class="form-control" required="" id="content_two" type="text"></textarea>

                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail1"> يبدأ في </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" id="start"
                                            placeholder="MM/DD/YYYY" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail1"> ينتهي في </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" id="end"
                                            placeholder="MM/DD/YYYY" type="text">
                                    </div>
                                </div>

                                {{-- <div class="col-lg-6">
                                    <div class="inline w-100 field">
                                        <label> محتوي 2 </label>
                                        <select name="skills" multiple="" class="label ui selection fluid dropdown">
                                            <option value="2">
                                                انطلق نحو علم الادارة
                                            </option>
                                            <option value="1">
                                                انطلق نحو علم الادارة
                                            </option>
                                            <option value="3">
                                                انطلق نحو علم الادارة
                                            </option>


                                        </select>
                                    </div>

                                </div> --}}
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <p class="mg-b-10">حدد قالب الدعوة</p>
                                    <select class="form-control select2" id="theme_name">
                                        <option value="T001">
                                            T001
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <p class="mg-b-10">طريقة التواصل</p>
                                    <select class="form-control select2" id="contact_type">
                                        <option value="whatsapp">
                                            واتس اب
                                        </option>
                                        <option value="sms">
                                            رسائل نصية
                                        </option>
                                        <option value="email">
                                            بريد الكتروني
                                        </option>
                                        <option value="whatsapp&sms">
                                            واتس اب و رسائل نصية
                                        </option>
                                        <option value="sms&email">
                                            رسائل نصية و بريد الكتروني
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> طريقة التسجيل </p>
                                    <select class="form-control select2" id="register">
                                        <option value="qr">
                                            كيو ان عند الحضور
                                        </option>
                                        <option value="visit">
                                            حضور
                                        </option>
                                        <option value="selfie">
                                            كيو ار و صوره شخصيه
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10"> طريقة الحضور</p>
                                    <select class="form-control select2" id="attendance_method">
                                        <option value="remote">
                                            عن بعد
                                        </option>
                                        <option value="immanence">
                                            حضوري
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <p class="mg-b-10"> عرض اسم المدعو </p>
                                    <select class="form-control select2" id="show_invited">
                                        <option value="yes">
                                            نعم
                                        </option>
                                        <option value="no">
                                            لا
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>هوية العرض</p>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">

                                <div class="col-lg-6 mb-3">
                                    <label for="exampleInputEmail1"> اللون </label>
                                    <input class="form-control" required="" type="color" id="color"
                                        type="text">
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail1"> ملف الشعار </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1"> ملف البرنامج </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                            </div>
                            <!-- closed row -->

                            <br>

                            <div class="f1-buttons d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-previous" disabled><i
                                        class="ti-angle-double-right"></i> السابق </button>

                                <!-- point steps open -->
                                <div class="f1-steps d-flex justify-content-evenly">
                                    <div class="f1-step">
                                        <div class="f1-step-icon"></div>
                                    </div>
                                    <div class="f1-step active">
                                        <div class="f1-step-icon"></div>
                                    </div>
                                </div>
                                <!-- point steps closed -->
                                <button class="btn-next btn btn-warning-gradient btn-with-icon mr-1">التالي</button>
                            </div>
                        </fieldset>
                        <!--closed pag  one   -->


                        <!--open pag two   -->
                        <fieldset>

                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <label for="example"> اسم الدورة </label>
                                        <input class="form-control" required="" type="text" id="course_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10"> لغة الدورة </p>
                                    <select class="form-control select2" id="language">
                                        <option value="arabic">
                                            العربية
                                        </option>
                                        <option value="english">
                                            الانجليزية
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <label for="example"> الفئة </label>
                                        <select id="category_id" class="form-control select2">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> عدد المقاعد المتاحة </label>
                                    <input class="form-control" required="" type="number" id="seat_count">
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> يبدأ في </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" id="coruse_start"
                                            placeholder="MM/DD/YYYY" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> هل يوجد اختبار </p>
                                    <select class="form-control select2" id="is_exam">
                                        <option value="1">
                                            نعم
                                        </option>
                                        <option value="0">
                                            لا
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="example"> المدة </label>
                                    <input class="form-control" id="duration" required="" type="number"
                                        placeholder="This is input">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> هل يوجد شهادة</p>
                                    <select class="form-control select2" id="is_certificate">
                                        <option value="1">
                                            نعم
                                        </option>
                                        <option value="0">
                                            لا
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <label for="example"> اسم المدرب </label>
                                        <input class="form-control" required="" id="trainer" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> نسبة الحصول على الشهادة </label>
                                    <input class="form-control" required="" id="percentage_certificate"
                                        type="number">
                                </div>
                            </div>
                            <!-- closed row -->


                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <label for="example"> اسم المنسق </label>
                                    <input class="form-control" required="" id="coordinator" type="text">
                                </div>
                                <div class="col-lg-6">
                                    <label for="example"> شروط اضافية </label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <label class="ckbox"><input id="attendance_questionnaire"
                                                    type="checkbox"><span>ملى استبيان
                                                    الحضور</span></label>
                                        </div>
                                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input checked="" id="image_check"
                                                    type="checkbox"><span> صورة شخصية
                                                </span></label>
                                        </div>
                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input id="study" type="checkbox"><span> دراسة
                                                </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- closed row -->

                            <br>
                            <div class="f1-buttons d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-previous"><i class="ti-angle-double-right"></i>
                                    السابق </button>
                                <!-- point steps open -->
                                <div class="f1-steps d-flex justify-content-evenly">
                                    <div class="f1-step activated">
                                        <div class="f1-step-icon "></div>
                                    </div>
                                    <div class="f1-step activated">
                                        <div class="f1-step-icon "></div>
                                    </div>
                                </div>
                                <!-- point steps closed -->
                                <button class=" btn btn-warning-gradient btn-with-icon mr-1" onclick="performStore()"
                                    type="button">التالي</button>
                            </div>
                        </fieldset>
                        <!--closed pag tow   -->
                    </form>
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
            formData.append('name', document.getElementById('name').value);
            formData.append('content_one', document.getElementById('content_one').value);
             formData.append('username', document.getElementById('username').value);
            formData.append('content_two', document.getElementById('content_two').value);
            formData.append('start', document.getElementById('start').value);
            formData.append('end', document.getElementById('end').value);
            formData.append('theme_name', document.getElementById('theme_name').value);
            formData.append('contact_type', document.getElementById('contact_type').value);
            formData.append('register', document.getElementById('register').value);
            formData.append('show_invited', document.getElementById('show_invited').value);
            formData.append('color', document.getElementById('color').value);
            formData.append('register', document.getElementById('register').value);
            formData.append('attendance_method', document.getElementById('attendance_method').value);
            formData.append('image', document.getElementById('image').files[0]);
            formData.append('file', document.getElementById('file').files[0]);
            formData.append('course_name', document.getElementById('course_name').value);
            formData.append('language', document.getElementById('language').value);
            formData.append('seat_count', document.getElementById('seat_count').value);
            formData.append('coruse_start', document.getElementById('coruse_start').value);
            formData.append('is_exam', document.getElementById('is_exam').value);
            formData.append('duration', document.getElementById('duration').value);
            formData.append('is_certificate', document.getElementById('is_certificate').value);
            formData.append('trainer', document.getElementById('trainer').value);
            formData.append('percentage_certificate', document.getElementById('percentage_certificate').value);
            formData.append('study', document.getElementById('study').checked);
            formData.append('coordinator', document.getElementById('coordinator').value);
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('image_check', document.getElementById('image_check').checked);
            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('attendance_questionnaire', document.getElementById('attendance_questionnaire').checked);
            storeRoute('/dashboard/admin/programs', formData)


        }
    </script>

    <!-- JQuery min js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput date js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!-- wizard -->
    <script src="{{ URL::asset('assets/plugins/wizards/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/wizards/js/retina-1.1.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/wizards/js/scripts.js') }}"></script>
    <!-- select mul -->
    <script src="{{ URL::asset('assets/plugins/select_mul/js/semantic.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/select_mul/js/main.js') }}"></script>
@endsection
