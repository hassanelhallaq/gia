@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="" method="post" class="f1">
                        <!-- row -->
                        <div class="row row-sm mb-3">
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> البرامج </label>
                                    <select id="program_id" class="form-control select2">
                                        @foreach ($program as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm mb-3">
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> اسم الدورة </label>
                                    <input class="form-control" required="" type="text" id="course_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="mg-b-10">الوصف</p>
                                <textarea class="form-control" required="" id="desc" type="text"></textarea>

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
                            <div class="col-lg-6">
                                <label for="example"> الموقع </label>
                                <input class="form-control" id="location" required="" type="text"
                                    placeholder="This is input">
                            </div>
                            <div class="col-lg-6">
                                <label for="example"> التقيم </label>
                                <input class="form-control" id="link" required="" type="text"
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
                                    <select id="trainer" class="form-control select2">
                                        @foreach ($trainers as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <label for="example"> نسبة الحصول على الشهادة </label>
                                <input class="form-control" required="" id="percentage_certificate" type="number">
                            </div>
                        </div>
                        <!-- closed row -->


                        <!-- row -->
                        <div class="row row-sm mb-3">
                            <div class="col-lg-6">
                                <label for="example"> اسم المنسق </label>
                                <input class="form-control" required="" id="coordinator" type="text">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="exampleInputEmail1"> صوره </label>
                                <div class="custom-file">
                                    <input class="custom-file-input" id="image_course" type="file">
                                    <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="example"> شروط اضافية </label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="ckbox"><input id="attendance_questionnaire"
                                                type="checkbox"><span>ملى
                                                استبيان
                                                الحضور</span></label>
                                    </div>
                                    <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                                        <label class="ckbox"><input checked="" id="image_check"
                                                type="checkbox"><span>
                                                صورة شخصية
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
                                type="button">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function performStore() {
            let formData = new FormData();
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

             formData.append('attendance_questionnaire', document.getElementById('attendance_questionnaire').checked);
             formData.append('program_id', document.getElementById('program_id').value);
             formData.append('image_course', document.getElementById('image_course').files[0]);
             formData.append('location', document.getElementById('location').value);
             formData.append('link', document.getElementById('link').value);



            formData.append('desc', document.getElementById('desc').value);

            storeRoute('/dashboard/admin/courses', formData)


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
