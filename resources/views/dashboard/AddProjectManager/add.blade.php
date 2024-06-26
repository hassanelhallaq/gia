@extends('dashboard.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/wizard/style copy 3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/wizard/form-elements.css') }}">
@endsection
@section('css')
    <style>
        #cart-create-mp {
            display: none !important;
            background-color: red
        }

        .input-group-prepend {
            margin-right: -1px;
        }

        .input-group-append,
        .input-group-prepend {
            display: -ms-flexbox;
            display: flex;
        }
    </style>
@endsection
@section('content')
    <div class="row m-auto">
        <div class="col-sm-10  m-auto">
            <form role="form" action="" method="post" class="f1">
                <h5 class=" text-center"> مرحبا    {{Auth::user()->name}} </h5>
                <p class=" text-center "> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>
                <div class="f1-steps mb-5 mt-2">
                    <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="0" data-number-of-steps="7" style="width: 1%;"></div>
                    </div>
                    <div class="f1-step active">
                        <div class="f1-step-icon">6</div>
                        <p> انشاء مشروع </p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon">1</div>
                        <p> مدير المشروع </p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon">2</div>
                        <p> منسق المشروع </p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon">3</div>
                        <p> المدربين </p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon">4</div>
                        <p> منسقو التدريب </p>
                    </div>
                    <div class="f1-step">
                        <div class="f1-step-icon">5</div>
                        <p> المستشارون </p>
                    </div>

                    <div class="f1-step">
                        <div class="f1-step-icon">7</div>
                        <p> التكليف </p>
                    </div>
                </div>
                <div class="card p-4">
                    <div class="body-cord">
                        {{-- ############# fieldset 1    نموذج انشلء مشروع المشروع ########### --}}
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج انشاء مشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">

                                    <label class="wizard-form-text-label mb-5 rdiobox"><input name="rdio"
                                            @if ($client->public_sector == 'public_sector') checked="" @endif id="public_sector"
                                            type="radio"> <span> القطاع العام </span></label>
                                </div>
                                <div class="col-6 ">
                                    <label class="rdiobox mb-5"><input @if ($client->sector_type == 'private_sector') checked @endif
                                            name="rdio" id="private_sector" type="radio"> <span> القطاع الخاص
                                        </span></label>
                                </div>




                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" id="tranning" name="rdioType" type="radio">
                                        <span> التدريب </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" id="tranning_and_colustant" name="rdioType" type="radio">
                                        <span> التدريب والاستشارات </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" id="colustant" name="rdioType" type="radio">
                                        <span> الاستشارات </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" id="other_type"  name="rdioType" type="radio">
                                        <span> خدمات اخري </span></label>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> عنوان اسم المشروع *</label>
                                        <input type="text" class="form-control wizard-required" id="name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> رقم العقد *</label>
                                        <input type="text" class="form-control wizard-required" id="contract_number">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <p class="mg-b-10"> اسم المستخدم </p>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <abutton type="button" onclick="checkUser()" class="input-group-text">check user</abutton>
                                        </div><input aria-describedby="basic-addon1" aria-label="Username" id="username"
                                            class="form-control" placeholder=" اسم المستخدم " type="text">
                                    </div>
                                </div>




                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ البدأ *</label>
                                        <input type="date" class="form-control wizard-required" id="start">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> تاريخ الانتهاء *</label>
                                        <input type="date" class="form-control wizard-required" id="end">
                                    </div>
                                </div>




                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> عدد الدورات في المشروع
                                            *</label>
                                        <input type="nuumber" class="form-control wizard-required" id="courses_count">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> عدد المتدربين الاجمالي
                                            *</label>
                                        <input type="number" class="form-control wizard-required" id="trainers_count">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> مقر تنفيذ المشروع مقر العمل
                                            / مقر مركز التدريب *</label>
                                        <input type="text" class="form-control wizard-required" id="training_center">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> الخدمات اللوجستية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="logistics_services">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10"> طريقة التسجيل </p>
                                    <select class="form-control select2" id="attendance_method">
                                        <option value="من خلال صفحة الهبوط "> من خلال صفحة الهبوط </option>
                                        <option value="من خلال المنصة فقط "> من خلال المنصة فقط </option>
                                        <option value="جميع الخيارات "> جميع الخيارات </option>

                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="wizard-form-text-label mb-5 rdiobox"><input name="rdio"
                                        id="coffe_break"    type="radio"> <span> كوفي بريك </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" id="lanch" name="rdio" type="radio">
                                        <span> غداء </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" id="other"  name="rdio" type="radio">
                                        <span> اخري حدد </span></label>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <label for="exampleInputEmail1"> إدراج ملف  (صورة / ملف pdf) </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="prog_file">
                                        <label class="input-group-text" for="address">Upload</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <label for="exampleInputEmail1"> إدراج المرشحين  (صورة / ملف pdf) </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="excel_file">
                                        <label class="input-group-text" for="address">Upload</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;"
                                        class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                                        السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn ml-1 btn-warning-gradient btn-with-icon"
                                        onclick="performStoreProject({{ $id }})"> حفظ بيانات المشروع </button>
                                    <button type="button" class="btn btn-outline-warning btn-next "> المتابعة لاصدار
                                        تكليف </button>
                                </div>
                            </div>
                        </fieldset>
                        {{-- #############✔ fieldset 2 نموذج اضافة مدير المشروع  ########### --}}
                        <fieldset id="cart-create-mp-perant">
                            <div id="cart-create-mp" class="cart-create-mp" style="display: none">
                                <h5 class=" text-center mt-3 mb-5"> نموذج اضافة مدير المشروع </h5>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                                *</label>
                                            <input type="text" class="form-control wizard-required" id="manager_name">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                                *</label>
                                            <input type="text" class="form-control wizard-required"
                                                id="english_name_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                            <input type="text" class="form-control wizard-required"
                                                id="manager_nationality">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                            <input type="date" class="form-control wizard-required"
                                                id="birthday_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية
                                                *</label>
                                            <input type="text" class="form-control wizard-required"
                                                id="academicـcertificate_manger">
                                        </div>
                                    </div>


                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname5" class="wizard-form-text-label"> الاعتماد
                                                *</label>
                                            <input type="text" class="form-control wizard-required"
                                                id="main_training_area_manger">
                                        </div>
                                    </div> --}}

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                            <input type="text" class="form-control wizard-required"
                                                id="accreditation_manger">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                            <input type="number" class="form-control wizard-required"
                                                id="years_of_experience_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                            <div class="input-group mb-12">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="country_code_label">+966</span>
                                                </div>
                                                <input type="number" class="form-control wizard-required" id="phone_manger" onchange="addCountryCode()" placeholder="Enter phone number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني
                                                *</label>
                                            <input type="email" class="form-control wizard-required" id="email_manger">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname8" class="wizard-form-text-label"> كلمه المرور*</label>
                                            <input type="password" class="form-control wizard-required"
                                                id="password_manger">
                                        </div>
                                    </div>
                                    <div class="col-lg-6  col-sm-12  mb-4">
                                        <p class="mg-b-10"> الصلاحيات </p>
                                        <select class="form-control select2" id="manger_role_id">
                                            <option value="">

                                            </option>
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <div class="col-lg-4 col-sm-12">
                                        <label for="exampleInputEmail1"> تحميل السيرة الذاتية </label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="cv_manger">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control"
                                                id="accreditationـcertificate_manger">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <label for="exampleInputEmail1"> إدراج صورةشخصية </label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="pic_manger">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-between d-flex">
                                    {{-- <div class="">
                                        <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات
                                            منسق المشروع</button>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-outline-warning btn-with-icon  mr-1"> إضافة منسق مشروع آخر
                                            <i class="bi bi-plus"></i></button>
                                    </div> --}}


                                </div>

                                <div class="row mb-3 mt-4 justify-content-between d-flex">
                                    <div class="">
                                        <a href="javascript:;"
                                            class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous disabled">
                                            السابق </a>
                                    </div>
                                    <div class="d-flex">
                                        {{-- <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button> --}}
                                        <button type="button" onclick="performStoreManger()"
                                            class="btn  btn-warning-gradient btn-next">حفظ وتسجيل بيانات المستخدم</button>
                                    </div>
                                </div>
                            </div>

                            <div id="cart-search-mp" class="cart-search-mp">
                                <h6 class=" text-center mt-3 mb-5"> هل الجهة مسجلة مسبقاً </h6>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="" for="fname4" class="wizard-form-text-label"> البحث عن
                                                مدير مشروع موجود مسبقا من خلال القائمة ادناه *</label>
                                            <input type="text" name="inputManagerserch"
                                                placeholder="اكتب هنا للبحث عن جهة" class="form-control wizard-required"
                                                id="inputManagerserch">
                                            <div class=""></div>
                                        </div>
                                        <select class="form-control select2" id="MangerList" style="display: none;">

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-4 justify-content-between d-flex">
                                    <div class="">
                                        <button id="btnCreateMProject" class="btn btn-dark" type="button"> او انشاء مدير
                                            مشروع جديد </button>
                                    </div>
                                    <div class="d-flex">
                                        <a href="javascript:;"
                                            class="btn btn-warning-gradient form-wizard-previous-btn btn-previous "> السابق
                                        </a>
                                        <button type="button" onclick="performStoreMangerId()"
                                            class="btn  btn-warning-gradient btn-next">حفظ وتسجيل بيانات المستخدم</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        {{-- #############✔ fieldset 3 نموذج اضافة منسق المشروع########### --}}
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسق المشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" class="form-control wizard-required" id="cord_name">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="cord_name_english">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" class="form-control wizard-required" id="nationality_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" class="form-control wizard-required" id="birthday_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="academicـcertificate_cord">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الوظيفة الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="main_job_field_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="accreditation_cord">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required"
                                            id="years_of_experience_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="country_code_label">+966</span>
                                            </div>
                                        <input type="number" class="form-control wizard-required" id="phone_cord">
                                    </div>
                                </div>

                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="email_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> كلمه المرور*</label>
                                        <input type="password" class="form-control wizard-required" id="password_cord">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <p class="mg-b-10"> الصلاحيات </p>
                                    <select class="form-control select2" id="cord_role_id">
                                        <option value="">

                                        </option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل السيرة الذاتية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="pic_cord">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="accreditationـcertificate_cord">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>



                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="cv_cord">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات منسق
                                        المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1"> إضافة منسق مشروع آخر <i
                                            class="bi bi-plus"></i></button>
                                </div>
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;"
                                        class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                                        السابق </a>
                                </div>
                                <div class="d-flex">
                                    {{-- <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button> --}}
                                    <button type="button" onclick="performStoreCord()"
                                        class="btn  btn-warning-gradient btn-next">حفظ وتسجيل بيانات المستخدم</button>
                                </div>
                            </div>
                        </fieldset>

                        {{-- #############✔ fieldset 4 نموذج اضافة المدربين ########### --}}
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج اضافة المدربين </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" class="form-control wizard-required" id="trainer_name">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="trainer_name_english">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="nationality_trainer">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" class="form-control wizard-required" id="birthday_trainer">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="academicـcertificate_trainer">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة التدريبية(TOT)
                                            *</label>
                                        <input type="text" class="form-control wizard-required" id="tot_trainer">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="main_training_area_trainer">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="accreditation_trainer">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required"
                                            id="years_of_experience_trainer">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="country_code_label">+966</span>
                                            </div>

                                        <input type="number" class="form-control wizard-required" id="phone_trainer">
                                    </div>
                                </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="email_trainer">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> كلمه المرور*</label>
                                        <input type="password" class="form-control wizard-required"
                                            id="password_trainer">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <p class="mg-b-10"> الصلاحيات </p>
                                    <select class="form-control select2" id="trainer_role_id">
                                        <option value="">

                                        </option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل السيرة الذاتية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="cv_trainer">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control"
                                            id="accreditationـcertificate_trainer">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="pic_trainer">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <input type="file" class="form-control" id="inputGroupFile02">




                            </div>
                            {{-- <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات مدربين
                                        المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1"> إضافة مدرب مشروع آخر <i
                                            class="bi bi-plus"></i></button>
                                </div>
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;"
                                        class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                                        السابق </a>
                                </div>
                                <div class="d-flex">
                                    {{-- <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button> --}}
                                    <button type="button" onclick="performStoreTrainer()"
                                        class="btn  btn-warning-gradient btn-next">حفظ وتسجيل بيانات المستخدم</button>
                                </div>
                            </div>
                        </fieldset>

                        {{-- #############✔ fieldset 5  نموذج اضافة منسقو التدريب  ########### --}}
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسقو التدريب </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="cord_trainer_name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="cord_trainer_name_english">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="cord_trainer_nationality">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" class="form-control wizard-required"
                                            id="cord_trainer_birthday">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="cord_trainer_academicـcertificate">
                                    </div>
                                </div>




                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="cord_trainer_main_training_area">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required"
                                            id="cord_trainer_years_of_experience">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="country_code_label">+966</span>
                                            </div>
                                        <input type="number" class="form-control wizard-required"
                                            id="cord_trainer_phone">
                                    </div>
                                </div>

                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required"
                                            id="cord_trainer_email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> كلمه المرور*</label>
                                        <input type="password" class="form-control wizard-required"
                                            id="cord_trainer_password">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <p class="mg-b-10"> الصلاحيات </p>
                                    <select class="form-control select2" id="cord_trainer_role_id">
                                        <option value="">

                                        </option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل السيرة الذاتية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="cord_trainer_cv">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="cord_trainer_accreditation">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="cord_trainer_pic">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات منسقو
                                        المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1"> إضافة منسقو مشروع آخر <i
                                            class="bi bi-plus"></i></button>
                                </div>
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;"
                                        class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                                        السابق </a>
                                </div>
                                <div class="d-flex">
                                    {{-- <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button> --}}
                                    <button type="button" onclick="performStoreCordTrainer()"
                                        class="btn  btn-warning-gradient btn-next">حفظ وتسجيل بيانات المستخدم</button>
                                </div>
                            </div>
                        </fieldset>

                        {{-- #############✔ fieldset 6  نموذج اضافة المستشارون ########### --}}
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج اضافة المستشارون </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" class="form-control wizard-required" id="name">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" class="form-control wizard-required" id="name_english">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" class="form-control wizard-required" id="nationality">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" class="form-control wizard-required" id="birthday">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="academicـcertificate">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الاستشارات الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="main_field_of_consulting">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            id="main_training_area">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required"
                                            id="years_of_experience">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="input-group mb-12">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="country_code_label">+966</span>
                                            </div>
                                        <input type="number" class="form-control wizard-required" id="phone">
                                    </div>
                                </div>

                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> كلمه المرور*</label>
                                        <input type="password" class="form-control wizard-required" id="password">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <p class="mg-b-10"> الصلاحيات </p>
                                    <select class="form-control select2" id="role_id">
                                        <option value="">

                                        </option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل السيرة الذاتية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="cv">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="accreditationـcertificate">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="pic">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>



                            </div>

                            {{-- <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات مستشار
                                        المشروع </button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1"> إضافة مستشار مشروع آخر <i
                                            class="bi bi-plus"></i></button>
                                </div>
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;"
                                        class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                                        السابق </a>
                                </div>
                                <div class="d-flex">
                                    {{-- <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button> --}}
                                    <button type="button" onclick="performStore()"
                                        class="btn  btn-warning-gradient btn-next">حفظ وتسجيل بيانات المستخدم</button>
                                </div>
                            </div>
                        </fieldset>



                        {{-- ############# fieldset 7 ########### --}}
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> التكليف</h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <label class="wizard-form-text-label mb-5 rdiobox"><input name="rdio"
                                            type="radio"> <span> القطاع العام </span></label>
                                </div>
                                <div class="col-6 ">
                                    <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio">
                                        <span> القطاع الخاص </span></label>
                                </div>

                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button type="button" class="btn btn-dark"> مجال المشروع </button>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button type="button" class="btn  btn-warning-gradient "> التدريب </button>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> الاستشارات </button>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> خدمات اخري </button>
                                </div>
                                <div class="col-12 mb-4">
                                    <p class="mg-b-10"> يرجي اختيار مدير المشروع </p>
                                    <select class="form-control select2" id="mang_select">


                                    </select>
                                </div>

                                <div class="col-12 mb-4">
                                    <p class="mg-b-10"> يرجي اختيار منسق المشروع </p>
                                    <select class="form-control select2" id="cord_select">


                                    </select>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> تعليمات حول المشروع المشروع
                                            *</label>
                                        <textarea rows="4" type="text" class="form-control wizard-required" id="info"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <label for="exampleInputEmail1"> يرجي ارفاق ملفات المشروع </label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="program_files">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;"
                                        class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                                        السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn ml-1 btn-warning-gradient btn-with-icon" type="button"
                                        onclick="performStoreFinal()"> حفظ بيانات المشروع
                                    </button>
                                    {{-- <button type="button" class="btn btn-outline-warning btn-next ">   المتابعة لاصدار تكليف </button> --}}
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/wizard/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/wizard/js/retina-1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/wizard/js/scripts.js') }}"></script>

    <script>
        document.getElementById("btnCreateMProject").addEventListener("click", function() {
            var div1 = document.getElementById("cart-create-mp");
            var div2 = document.getElementById("cart-search-mp");

            if (div1.style.display === "none") {
                div1.style.display = "block";
                div2.style.display = "none";
            }

        });


        var div1 = document.getElementById("cart-create-mp");
        var div2 = document.getElementById("cart-search-mp");
        const inputElement = document.getElementById('inputManagerserch');
        const ElementParent = document.getElementById('cart-create-mp-perant');
        const divDeleted = div1;

        inputElement.addEventListener('change', function() {
            // divDeleted=div1;
            div1.remove();
            console.log(divDeleted);
        });
        document.getElementById("btnCreateMProject").addEventListener("click", function() {
            if (div1.style.display === "none") {
                div1.style.display = "block";
                div2.style.display = "none";
                ElementParent.append(divDeleted);
                div2.remove();
            }
        });
        function checkUser() {
            let formData = new FormData();
            formData.append('username', document.getElementById('username').value);
            store('/dashboard/admin/check-user', formData)
        }
        function performStoreManger() {
            let formData = new FormData();
            formData.append('name', document.getElementById('manager_name').value);
            formData.append('name_english', document.getElementById('english_name_manger').value);
            formData.append('nationality', document.getElementById('manager_nationality').value);
            formData.append('birthday', document.getElementById('birthday_manger').value);
            formData.append('academicـcertificate', document.getElementById('academicـcertificate_manger').value);
            // formData.append('main_training_area', document.getElementById('main_training_area_manger').value);
            formData.append('accreditation', document.getElementById('accreditation_manger').value);
            formData.append('years_of_experience', document.getElementById('years_of_experience_manger').value);
            formData.append('phone', document.getElementById('phone_manger').value);
            formData.append('email', document.getElementById('email_manger').value);
            formData.append('password', document.getElementById('password_manger').value);
            formData.append('role_id', document.getElementById('manger_role_id').value);
            formData.append('cv', document.getElementById('cv_manger').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate_manger').files[
                0]);
            formData.append('pic', document.getElementById('pic_manger').files[0]);
            formData.append('type', 'manger');

            store('/dashboard/admin/admins', formData)
        }

        function performStoreCord() {
            let formData = new FormData();
            formData.append('name', document.getElementById('cord_name').value);
            formData.append('name_english', document.getElementById('cord_name_english').value);
            formData.append('nationality', document.getElementById('nationality_cord').value);
            formData.append('birthday', document.getElementById('birthday_cord').value);
            formData.append('academicـcertificate', document.getElementById('academicـcertificate_cord').value);
            formData.append('main_job_field', document.getElementById('main_job_field_cord').value);
            formData.append('accreditation', document.getElementById('accreditation_cord').value);
            formData.append('years_of_experience', document.getElementById('years_of_experience_cord').value);
            formData.append('phone', document.getElementById('phone_cord').value);
            formData.append('email', document.getElementById('email_cord').value);
            formData.append('password', document.getElementById('password_cord').value);
            formData.append('role_id', document.getElementById('cord_role_id').value);
            formData.append('cv', document.getElementById('cv_cord').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate_cord').files[
                0]);
            formData.append('pic', document.getElementById('pic_cord').files[0]);
            formData.append('type', 'cordreator');

            store('/dashboard/admin/admins', formData)
        }

        function performStoreTrainer() {
            let formData = new FormData();
            formData.append('name', document.getElementById('trainer_name').value);
            formData.append('name_english', document.getElementById('trainer_name_english').value);
            formData.append('nationality', document.getElementById('nationality_trainer').value);
            formData.append('birthday', document.getElementById('birthday_trainer').value);
            formData.append('academicـcertificate', document.getElementById('academicـcertificate_trainer').value);
            formData.append('tot', document.getElementById('tot_trainer').value);
            formData.append('main_training_area', document.getElementById('main_training_area_trainer').value);
            formData.append('accreditation', document.getElementById('accreditation_trainer').value);
            formData.append('years_of_experience', document.getElementById('years_of_experience_trainer').value);
            formData.append('phone', document.getElementById('phone_trainer').value);
            formData.append('email', document.getElementById('email_trainer').value);
            formData.append('password', document.getElementById('password_trainer').value);
            formData.append('role_id', document.getElementById('trainer_role_id').value);
            formData.append('cv', document.getElementById('cv_trainer').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate_trainer').files[
                0]);
            formData.append('pic', document.getElementById('pic_trainer').files[0]);
            store('/dashboard/admin/trainers', formData)
        }



        function performStoreCordTrainer() {
            let formData = new FormData();
            formData.append('name', document.getElementById('cord_trainer_name').value);
            formData.append('name_english', document.getElementById('cord_trainer_name_english').value);
            formData.append('nationality', document.getElementById('cord_trainer_nationality').value);
            formData.append('birthday', document.getElementById('cord_trainer_birthday').value);
            formData.append('academicـcertificate', document.getElementById('cord_trainer_academicـcertificate').value);
            formData.append('main_training_area', document.getElementById('cord_trainer_main_training_area').value);
            formData.append('accreditation', document.getElementById('accreditation_trainer').value);
            formData.append('years_of_experience', document.getElementById('cord_trainer_years_of_experience').value);
            formData.append('phone', document.getElementById('cord_trainer_phone').value);
            formData.append('email', document.getElementById('cord_trainer_email').value);
            formData.append('password', document.getElementById('cord_trainer_password').value);
            formData.append('role_id', document.getElementById('cord_trainer_role_id').value);
            formData.append('cv', document.getElementById('cord_trainer_cv').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('cord_trainer_accreditation').files[0]);
            formData.append('pic', document.getElementById('cord_trainer_pic').files[0]);
            formData.append('type', 'cord-trainner');

            store('/dashboard/admin/admins', formData)
        }

        function performStoreFinal() {
            let formData = new FormData();
            formData.append('info', document.getElementById('info').value);
            formData.append('program_files', document.getElementById('program_files').files[0]);
            storeRoute('/dashboard/admin/programWizardUpdate', formData)
        }

        function performStore() {

            // Make an Ajax request to fetch project managers
            $.ajax({
                url: "{{ url('dashboard/admin/search/adminMangersel') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    var options = '';
                    $.each(response, function(index, manager) {
                        options += '<option value="' + manager.id + '">' + manager.name + '</option>';
                    });
                    $('#mang_select').append(options);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            $.ajax({
                url: "{{ url('dashboard/admin/search/admincord_select') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    var options = '';
                    $.each(response, function(index, manager) {
                        options += '<option value="' + manager.id + '">' + manager.name + '</option>';
                    });
                    $('#cord_select').append(options);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });



            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('name_english', document.getElementById('name_english').value);
            formData.append('main_training_area', document.getElementById('main_training_area').value);
            formData.append('nationality', document.getElementById('nationality').value);
            formData.append('birthday', document.getElementById('birthday').value);
            formData.append('academicـcertificate', document.getElementById('academicـcertificate').value);
            formData.append('main_field_of_consulting', document.getElementById('main_field_of_consulting').value);
            formData.append('accreditation', document.getElementById('accreditation_trainer').value);
            formData.append('years_of_experience', document.getElementById('years_of_experience').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('role_id', document.getElementById('role_id').value);
            formData.append('cv', document.getElementById('cv').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate').files[0]);
            formData.append('pic', document.getElementById('pic').files[0]);
            formData.append('type', 'consultants');

            store('/dashboard/admin/admins', formData)
        }

        function performStoreProject(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('contract_number', document.getElementById('contract_number').value);
            formData.append('username', document.getElementById('username').value);
            formData.append('start', document.getElementById('start').value);
            formData.append('end', document.getElementById('end').value);
            formData.append('courses_count', document.getElementById('courses_count').value);
            formData.append('trainers_count', document.getElementById('trainers_count').value);
            formData.append('logistics_services', document.getElementById('logistics_services').value);
            formData.append('attendance_method', document.getElementById('attendance_method').value);
            formData.append('training_center', document.getElementById('training_center').value);
            formData.append('public_sector', document.getElementById('public_sector').checked);
            formData.append('private_sector', document.getElementById('private_sector').checked);
            formData.append('coffe_break', document.getElementById('coffe_break').checked);
            formData.append('lanch', document.getElementById('lanch').checked);
            formData.append('other', document.getElementById('other').checked);
            formData.append('tranning', document.getElementById('tranning').checked);
            formData.append('tranning_and_colustant', document.getElementById('tranning_and_colustant').checked);
            formData.append('colustant', document.getElementById('colustant').checked);
            formData.append('other_type', document.getElementById('other_type').checked);
            formData.append('prog_file', document.getElementById('prog_file').files[0]);
            formData.append('excel_file', document.getElementById('excel_file').files[0]);
            store('/dashboard/admin/programWizardStore/' + id, formData)
        }

        function performStoreMangerId() {
            let formData = new FormData();
            formData.append('manger_id', document.getElementById('MangerList').value);
            formData.append('type', 'manger');
            store('/dashboard/admin/admins-manger', formData)
        }
    </script>
    <script>
        $(document).ready(function() {
            // Function to hide the select element initially
            $('#MangerList').hide();

            $('#inputManagerserch').on('input', function() {
                var searchQuery = $(this).val();
                if (searchQuery.trim() !== '') {
                    // Show the select element when the user starts typing
                    $('#MangerList').show();
                    $.ajax({
                        url: "{{ route('search.admins') }}",
                        method: "GET",
                        data: {
                            inputManagerserch: searchQuery
                        },
                        success: function(data) {
                            $('#MangerList').empty();
                            $.each(data, function(index, organization) {
                                $('#MangerList').append('<option value="' + organization
                                    .id + '">' + organization.name + '</option>');
                            });
                        }
                    });
                } else {
                    // Hide the select element when the search input is empty
                    $('#MangerList').hide();
                }
            });
        });

        function redirect() {
            var clientId = document.getElementById('organizationList').value;
            if (clientId) {
                window.location.href = "{{ route('AddProjectManager', ':id') }}".replace(':id', clientId);
            }
        }
    </script>
@endsection
