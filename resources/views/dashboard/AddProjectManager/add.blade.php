@extends('dashboard.layouts.master')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/wizard/style copy 3.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/wizard/form-elements.css') }}">
@endsection

@section('content')

<div class="row m-auto">
    <div class="col-sm-10  m-auto">
        <form role="form" action="" method="post" class="f1">
            <h5 class=" text-center"> مرحبا محمد الزرو </h5>
			<p class=" text-center "> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>

            <div class="f1-steps mb-5 mt-2">
                <div class="f1-progress">
                    <div class="f1-progress-line" data-now-value="0" data-number-of-steps="7" style="width: 1%;"></div>
                </div>
                <div class="f1-step active">
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
                    <div class="f1-step-icon">6</div>
                    <p> انشاء مشروع </p>
                </div>

                <div class="f1-step">
                    <div class="f1-step-icon">7</div>
                    <p>  التكليف </p>
                </div>

            </div>
            <div class="card p-4">
                <div class="body-cord">
                    {{--#############✔ fieldset 1 نموذج اضافة مدير المشروع  ###########--}}
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة مدير المشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  التدريب الرئيسي  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="image" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات منسق المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1">  إضافة منسق مشروع آخر <i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous disabled"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <button type="button" class="btn  btn-warning-gradient btn-next"> التوجة للخطوه التالية </button>
                                </div>
                            </div>
                    </fieldset>

                    {{--#############✔ fieldset 2 نموذج اضافة منسق المشروع###########--}}
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسق المشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الوظيفة الرئيسي  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="image" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات منسق المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1">  إضافة منسق مشروع آخر <i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous "> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <button type="button" class="btn  btn-warning-gradient btn-next"> التوجة للخطوه التالية </button>
                                </div>
                            </div>
                    </fieldset>

                    {{--#############✔ fieldset 3 نموذج اضافة المدربين ###########--}}
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة المدربين  </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة التدريبية(TOT) *</label>
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="image" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات مدربين المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1">  إضافة مدرب مشروع آخر <i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous "> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <button type="button" class="btn  btn-warning-gradient btn-next"> التوجة للخطوه التالية </button>
                                </div>
                            </div>
                    </fieldset>

                    {{--#############✔ fieldset 4  نموذج اضافة منسقو التدريب  ###########--}}
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسقو التدريب </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>




                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="image" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات منسقو المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1">  إضافة منسقو مشروع آخر <i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous "> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <button type="button" class="btn  btn-warning-gradient btn-next"> التوجة للخطوه التالية </button>
                                </div>
                            </div>
                    </fieldset>



                    {{--#############✔ fieldset 5  نموذج اضافة المستشارون ###########--}}
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة المستشارون </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  الاستشارات الرئيسي  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  التدريب الرئيسي  *</label>
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="image" type="file">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                        <input class="custom-file-input" id="file" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات مستشار المشروع </button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1">  إضافة مستشار مشروع آخر <i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous "> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <button type="button" class="btn  btn-warning-gradient btn-next"> التوجة للخطوه التالية </button>
                                </div>
                            </div>
                    </fieldset>

                    {{--############# fieldset 6    نموذج اكتمال المشروع ###########--}}
                    <fieldset>
                            <h5 class=" text-center mt-3 mb-5">  نموذج اكتمال المشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <label  class="wizard-form-text-label mb-5 rdiobox"><input name="rdio" type="radio"> <span> القطاع  العام </span></label>
                                </div>
                                <div class="col-6 ">
                                    <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio"> <span> القطاع الخاص </span></label>
                                </div>

                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button type="button" class="btn btn-dark"> مجال المشروع </button>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button type="button" class="btn  btn-warning-gradient "> التدريب </button>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  ">  الاستشارات </button>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  ">  خدمات اخري </button>
                                </div>
                                <div class="col-lg-6">
                                    <p class="mg-b-10"> طريقة الحضور</p>
                                    <select class="form-control select2" id="attendance_method">
                                        <option value="remote">.....
                                        </option>

                                    </select>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label">   عنوان اسم المشروع *</label>
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> رقم العقد *</label>
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10"> مدة المشروع  </p>
                                    <select class="form-control select2" id="attendance_method">
                                        <option value="remote"> شهر </option>
                                        <option value="remote"> شهرين </option>
                                        <option value="remote"> شهر 3  </option>
                                        <option value="remote"> شهر 4</option>
                                        <option value="remote"> شهر 5</option>
                                        <option value="remote"> شهر 6</option>
                                    </select>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ البدأ  *</label>
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label">  تاريخ الانتهاء *</label>
                                        <input type="date" class="form-control wizard-required" id="fname55">
                                    </div>
                                </div>




                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> عدد الدورات في المشروع  *</label>
                                        <input type="nuumber" class="form-control wizard-required" id="fname5">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label">  عدد المتدربين الاجمالي *</label>
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <p class="mg-b-10"> مكان تنفيذ خدمات المشروع الدولة / المدينة </p>
                                    <select class="form-control select2" id="attendance_method">
                                        <option value="remote">.....
                                        </option>

                                    </select>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label">  مقر تنفيذ المشروع مقر العمل / مقر مركز التدريب *</label>
                                        <input type="text" class="form-control wizard-required" id="fname7">
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label">  الخدمات اللوجستية *</label>
                                        <input type="text" class="form-control wizard-required" id="fname8">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label  class="wizard-form-text-label mb-5 rdiobox"><input name="rdio" type="radio"> <span> كوفي بريك </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio"> <span> غداء </span></label>
                                </div>
                                <div class="col-3">
                                    <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio"> <span> اخري حدد </span></label>
                                </div>
                            </div>
                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous "> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn ml-1 btn-warning-gradient btn-with-icon"> حفظ بيانات المشروع </button>
                                    <button type="button" class="btn btn-outline-warning btn-next ">   المتابعة لاصدار تكليف </button>
                                </div>
                            </div>
                    </fieldset>

                    {{--############# fieldset 7 ###########--}}
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسقو التدريب </h5>
                        <div class="row mt-5">
                            <div class="col-6">
                                <label  class="wizard-form-text-label mb-5 rdiobox"><input name="rdio" type="radio"> <span> القطاع  العام </span></label>
                            </div>
                            <div class="col-6 ">
                                <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio"> <span> القطاع الخاص </span></label>
                            </div>

                            <div class="col-lg-3 col-sm-6 mb-4">
                                <button type="button" class="btn btn-dark"> مجال المشروع </button>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <button type="button" class="btn  btn-warning-gradient "> التدريب </button>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <button class="btn btn-outline-warning ml-1 btn-with-icon  ">  الاستشارات </button>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <button class="btn btn-outline-warning ml-1 btn-with-icon  ">  خدمات اخري </button>
                            </div>
                            <div class="col-12 mb-4">
                                <p class="mg-b-10">  يرجي اختيار مدير المشروع </p>
                                <select class="form-control select2" id="attendance_method">
                                    <option value="remote">.....
                                    </option>

                                </select>
                            </div>

                            <div class="col-12 mb-4">
                                <p class="mg-b-10">  يرجي اختيار منسق المشروع </p>
                                <select class="form-control select2" id="attendance_method">
                                    <option value="remote">.....
                                    </option>

                                </select>
                            </div>


                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label">    تعليمات حول المشروع المشروع *</label>
                                    <textarea rows="4" type="text" class="form-control wizard-required" id="fname1"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="exampleInputEmail1">  يرجي ارفاق ملفات المشروع </label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Drop files here ⇬</label>
                                    <input class="custom-file-input" id="file" type="file">
                                </div>
                            </div>




                        </div>




                        <div class="row mb-3 mt-4 justify-content-between d-flex">
                            <div class="">
                                <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous "> السابق </a>
                            </div>
                            <div class="d-flex">
                                <button class="btn ml-1 btn-warning-gradient btn-with-icon"> حفظ بيانات المشروع </button>
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
@endsection
