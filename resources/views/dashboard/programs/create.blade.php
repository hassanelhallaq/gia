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
                                        <input class="form-control"  required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="exampleInputEmail1">محتوي 1 </label>
                                    <input class="form-control"  required="" type="text">
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">اسم العميل</label>
                                    <input class="form-control"  required="" type="text" value="This is input">
                                </div>
                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1">اسم المستخدم</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-search"></i></span>
                                        </div><input aria-describedby="basic-addon1" aria-label="Username" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10">محتوي 2</p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            انطلق نحو علم الادارة
                                        </option>
                                    </select>
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
                                        </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail1"> ينتهي في </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
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
                                    <!-- <p class="mg-b-10">صلاحيات الوصول 1</p>
                                    <select class="form-control select2" multiple="multiple">
                                        <option selected value="Firefox">
                                            محمد سعيد
                                        </option>
                                        <option value="Chrome">
                                            احمد علي
                                        </option>
                                    </select> -->
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <p class="mg-b-10">حدد قالب الدعوة</p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            G001
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">

                                    <p class="mg-b-10">طريقة التواصل</p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            واتس اب
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> طريقة التسجيل </p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            كيو ان عند الحضور
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10">  طريقة الحضور </p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            عن بعد
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- closed row -->

                            <!-- row -->
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <p class="mg-b-10">  عرض اسم المدعو </p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            نعم
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
                                    <input class="form-control" required="" type="text">
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail1"> ملف الشعار </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="exampleInputEmail1"> ملف البرنامج </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                            </div>
                            <!-- closed row -->

                            <br>

                            <div class="f1-buttons d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-previous" disabled><i class="ti-angle-double-right"></i> السابق </button>

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
                                        <input class="form-control"  required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <p class="mg-b-10"> لغة الدورة  </p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            العربية
                                        </option>
                                        <option value="Firefox">
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
                                        <input class="form-control"  required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> عدد المقاعد المتاحة </label>
                                    <input class="form-control" required="" type="text">
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
                                        </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> هل يوجد اختبار </p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            نعم
                                        </option>
                                        <option value="Firefox">
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
                                    <input class="form-control"  required="" type="text" value="This is input">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> هل يوجد شهادة</p>
                                    <select class="form-control select2">
                                        <option value="Firefox">
                                            نعم
                                        </option>
                                        <option value="Firefox">
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
                                        <input class="form-control"  required="" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> نسبة الحصول على الشهادة  </label>
                                    <input class="form-control" required="" type="number">
                                </div>
                            </div>
                            <!-- closed row -->


                            <!-- row -->
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <label for="example"> اسم المنسق </label>
                                    <input class="form-control"  required="" type="text">
                                </div>
                                <div class="col-lg-6">
                                    <label for="example"> شروط اضافية  </label>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <label class="ckbox"><input type="checkbox"><span>ملى استبيان الحضور</span></label>
                                        </div>
                                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input checked="" type="checkbox"><span> صورة شخصية </span></label>
                                        </div>
                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                            <label class="ckbox"><input disabled="" type="checkbox"><span> دراسة </span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- closed row -->

                            <br>
                            <div class="f1-buttons d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-previous"><i class="ti-angle-double-right"></i> السابق </button>
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
                                <button class="btn-next btn btn-warning-gradient btn-with-icon mr-1">التالي</button>
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
