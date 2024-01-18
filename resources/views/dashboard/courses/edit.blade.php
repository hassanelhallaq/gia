    @extends('dashboard.layouts.master')
    @section('header')
        <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
            <div class="left-content mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="../index.html" class="text-muted">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>البرامج</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> {{ $course->name }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="main-dashboard-header-right">
                <div class=" d-flex">
                    <a href="members.html" class="btn btn-previous text-warning" disabled><i
                            class="mdi mdi-account-outline "></i> المشاركين </a>
                    <a href="programme_detales.html" class="btn btn-previous text-warning" disabled><i
                            class="ti-angle-double-right"></i> السابق </a>
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
                                        <input class="input_no_border readonly" type="text" id="name"
                                            value="{{ $course->name }}" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p class="mg-b-10">الوصف</p>
                                    <textarea class="form-control" required="" id="desc" type="text">{{$course->desc}}</textarea>

                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> المقاعد </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" id="seat_count"
                                            value="{{ $course->seat_count }}" id="seat_count" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> الموقع </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text"
                                            value="{{ $course->location }}" id="location" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <label for="example"> التقيم </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text"
                                            value="{{ $course->rate }}" id="link" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
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
                                        <select id="category_id" class="form-control select2 input_no_border custom-select" disabled>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-buttonSelect"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="example"> هل يوجد إختبار </label>
                                    <div class="webflow-style-input">
                                        <select class="form-control select2 input_no_border custom-select" id="is_exam" disabled>
                                            <option value="1">
                                                نعم
                                            </option>
                                            <option value="0">
                                                لا
                                            </option>
                                        </select>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-buttonSelect"></i>
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
                                        <input class="input_no_border readonly" id="start" type="text"
                                            value="{{ $course->start }}" id="start" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> هل يوجد شهادة </label>
                                    <div class="webflow-style-input">
                                        <select class="form-control select2 input_no_border custom-select" id="is_certificate" disabled>
                                            <option value="1">
                                                نعم
                                            </option>
                                            <option value="0">
                                                لا
                                            </option>
                                        </select>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-buttonSelect"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <label for="example"> أسم المدرب </label>
                                    <div class="webflow-style-input">
                                        <select id="trainer" class="form-control select2 input_no_border custom-select" disabled>
                                            @foreach ($trainers as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="d-flex ml-2 mb-0">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-buttonSelect"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> نسبة الحصول على الشهادة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="percentage_certificate" type="text"
                                            value="{{ $course->percentage_certificate }}" id="percentage_certificate"
                                            readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> أسم المنسق </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="coordinator" type="text"
                                            value="{{ $course->coordinator }}" value="another value" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> حاله الاختبار القبلي</label>
                                    <div class="webflow-style-input">
                                        <select id="status_befor" class="form-control select2 input_no_border custom-select" >
                                            <option></option>
                                            <option value="active">
                                                فعال
                                            </option>
                                            <option value="InActive">
                                                غير مفعل
                                            </option>
                                            {{-- @endforeach --}}
                                        </select>

                                        <div class="d-flex ml-2">
                                            <p class="ml-1"> تحرير </p>
                                            <i class="bi bi-pen edit-button ml-2"></i>
                                            <p class="ml-3 "> البحث عن اختبار </p>
                                            <i class="bi bi-box-arrow-in-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> حاله الاختبار البعدي</label>
                                    <div class="webflow-style-input">
                                        <select id="status_after" class="form-control select2 input_no_border custom-select" >
                                            <option></option>
                                            <option value="active">
                                                فعال
                                            </option>
                                            <option value="InActive">
                                                غير مفعل
                                            </option>
                                            {{-- @endforeach --}}
                                        </select>

                                        <div class="d-flex ml-2">
                                            <p class="ml-1"> تحرير </p>
                                            <i class="bi bi-pen edit-button ml-2"></i>
                                            <p class="ml-3 "> البحث عن اختبار </p>
                                            <i class="bi bi-box-arrow-in-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> الاختبار القبلي </label>
                                    <div class="webflow-style-input">
                                        <select id="quiz_befor_id" class="form-control select2 input_no_border custom-select" >
                                            <option></option>

                                            @foreach ($quizesBefor as $item)
                                                <option @foreach ($course->quizes->where('type','befor') as $quiz)

                                                @if ($item->id == $quiz->id) selected @endif @endforeach
                                                value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>

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
                                        <input class="input_no_border readonly" id="level" type="text"
                                            value="{{ $course->level }}" value="another value" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> الأختبار البعدي </label>
                                    <div class="webflow-style-input">
                                        <select id="quiz_after_id" class="form-control select2 input_no_border custom-select" >
                                            <option></option>
                                            @foreach ($quizesBefor as $item)
                                            <option @foreach ($course->quizes->where('type','after') as $quiz)

                                            @if ($item->id == $quiz->id) selected @endif @endforeach
                                            value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                        </select>
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
                                        <input class="input_no_border readonly" id="language" type="text"
                                            value="{{ $course->language == 'arabic' ? 'عربي' : 'انجليزي' }}"
                                            value="another value" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p class="mg-b-10"> الحاله</p>
                                    <select class="form-control select2" id="register">
                                        <option  @if ($course->status == 'active') selected @endif  value="active">
                                        فعال
                                        </option>
                                        <option  @if ($course->status == 'Inactive') selected @endif  value="Inactive">
                                            غير فعال
                                        </option>

                                    </select>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="example"> المادة </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" id="subject" type="text"
                                            value="{{ $course->subject }}" value="another value" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحميل المادة </p>
                                            <i class="bi bi-box-arrow-in-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> تسجيل الحضور </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" value="another value"
                                            readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحرير </p>
                                            <i class="bi bi-pen edit-button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="example"> Assignment </label>
                                    <div class="webflow-style-input">
                                        <input class="input_no_border readonly" type="text" id="assignment"
                                            value="{{ $course->assignment }}" value="another value" readonly>
                                        <div class="d-flex ml-2">
                                            <p class="ml-3"> تحميل Assignment </p>
                                            <i class="bi bi-box-arrow-in-down"></i>

                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="exampleInputEmail1">  صوره </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image_course" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                            </div>
                            <!-- closed row -->
                            <br>
                            <div class="f1-buttons d-flex justify-content-between mt-5">
                                <div class="d-flex">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-sm" type="button"
                                        onclick="performUpdate({{ $course->id }})"> حفظ الاعدادات <i
                                            class="bi bi-floppy"></i></button>
                                    <button onclick="duplicate({{ $course->id }})" type="button" class="btn btn-outline-light btn-with-icon btn-sm mr-1 " id="copyButton"> استنساخ
                                        البرنامج <i class="far fa-clone"></i></button>
                                </div>
                                <a class="btn btn-danger btn-with-icon btn-sm "> حذف الدورة <i class="bi bi-trash3"></i></a>
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
            function performUpdate(id) {
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
                formData.append('quiz_befor_id', document.getElementById('quiz_befor_id').value);
                formData.append('quiz_after_id', document.getElementById('quiz_after_id').value);
                formData.append('image_course', document.getElementById('image_course').files[0]);
                formData.append('desc', document.getElementById('desc').value);
                formData.append('location', document.getElementById('location').value);
                formData.append('link', document.getElementById('link').value);
                formData.append('status_befor', document.getElementById('status_befor').value);
                formData.append('status_after', document.getElementById('status_after').value);


                let assignmentInput = document.getElementById('assignment');


                if (assignmentInput !== null && assignmentInput.files !== null && assignmentInput.files.length > 0) {
                    formData.append('assignment', assignmentInput.files[0]);
                    // The rest of your code for handling the form data
                } else {
                    // Handle the case where the 'assignment' element does not exist, or no file is selected
                    console.log("No file selected or element not found");
                }


                let subjectInput = document.getElementById('subject');
                if (subjectInput !== null && subjectInput.files !== null && subjectInput.files.length > 0) {
                    formData.append('subject', subjectInput.files[0]);
                    // The rest of your code for handling the form data
                } else {
                    // Handle the case where the 'assignment' element does not exist, or no file is selected
                    console.log("No file selected or element not found");
                }


                storeRoute('/dashboard/admin/courses/' + id, formData)


            }
            function duplicate(id) {
                let formData = new FormData();
                storeRoute('/dashboard/admin/duplicate/' + id, formData)
            }
        </script>
        <script src="{{ asset('assets/plugins/select_mul/js/semantic.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/select_mul/js/main.js') }}"></script>
        <!--Internal Fileuploads js-->
        <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
        <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    @endsection
