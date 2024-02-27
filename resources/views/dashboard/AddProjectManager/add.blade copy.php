@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/wizard/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/wizard/style copy 2.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- row -->
{{-- <div class="row w-100"> --}}
    <section class="wizard-section">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="form-wizard">
					<form action="" method="post" role="form">
						<div class="form-wizard-header">
                            <h5> مرحبا محمد الزرو </h5>
							<p> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span>1</span></li>
								<li><span>2</span></li>
								<li><span>3</span></li>
								<li><span>4</span></li>
                                <li><span>5</span></li>
                                <li><span>6</span></li>
                                <li><span>7</span></li>
							</ul>
						</div>

                        {{--############# fieldset 1 ###########--}}

						<fieldset class="wizard-fieldset show">
                            <h5 class=" text-center mt-5 mb-5"> نموذج اضافة مدير المشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الوظيفة الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname78">
                                        <label for="fname78" class="wizard-form-text-label"> الاعتماد *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة (PNG) </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="row mb-5 justify-content-between d-flex">
                                <div class="">
                                    <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> تسجيل بيانات مدير المشروع</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-outline-warning btn-with-icon  mr-1">  إضافة مدير مشروع آخر <i class="bi bi-plus"></i></button>
                                </div>
                            </div>

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <button type="button" href="javascript:;" class="btn btn-warning-gradient disabled p-2"> السابق </button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>
						</fieldset>

                        {{--############# fieldset 2 ###########--}}

                        <fieldset class="wizard-fieldset">
                            <h5 class=" text-center mt-5 mb-5"> نموذج اضافة منسق المشروع </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الوظيفة الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname78">
                                        <label for="fname78" class="wizard-form-text-label"> الاعتماد *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>



                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
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
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>

						</fieldset>





                        {{--############# fieldset 3 ###########--}}

                        <fieldset class="wizard-fieldset">
                            <h5 class=" text-center mt-5 mb-5"> نموذج اضافة المدربين </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة التدريبية(TOT) *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الوظيفة الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>



                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
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
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>

						</fieldset>

                        {{--############# fieldset 4 ###########--}}

                        <fieldset class="wizard-fieldset">
                            <h5 class=" text-center mt-5 mb-5">  نموذج اضافة منسقو التدريب  </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  التدريب الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>



                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
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
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>

						</fieldset>



                        {{--############# fieldset 5 ###########--}}

                        <fieldset class="wizard-fieldset">
                            <h5 class=" text-center mt-5 mb-5"> نموذج اضافة المستشارون </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  الاستشارات الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  التدريب الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
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
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>

						</fieldset>


                        {{--############# fieldset 6 ###########--}}

                        <fieldset class="wizard-fieldset">
                            <h5 class=" text-center mt-5 mb-5"> نموذج اضافة المستشارون </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  الاستشارات الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  التدريب الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
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
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>

						</fieldset>

                        {{--############# fieldset 7 ###########--}}

                        <fieldset class="wizard-fieldset">
                            <h5 class=" text-center mt-5 mb-5"> نموذج اضافة المستشارون </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname1">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                {{-- <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname2">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname3">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control wizard-required" id="fname4">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname55">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  الاستشارات الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control wizard-required" id="fname5">
                                        <label for="fname5" class="wizard-form-text-label"> مجال  التدريب الرئيسي  *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname6">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control wizard-required" id="fname7">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control wizard-required" id="fname8">
                                        <label for="fname8" class="wizard-form-text-label">  البريد الإلكتروني *</label>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label for="exampleInputEmail1">  تحميل السيرة الذاتية </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="image" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> تحميل شهادة الاعتماد </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="exampleInputEmail1"> إدراج صورةشخصية  </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="file" type="file">
                                        <label class="custom-file-label" for="customFile">Drop files here⇬</label>
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
                            </div> --}}

                            <div class="row mb-3 mt-4 justify-content-between d-flex">
                                <div class="">
                                    <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left"> السابق </a>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-warning ml-1 btn-with-icon  "> حفظ مسودة </button>
                                    <a class="form-wizard-next-btn btn btn-warning-gradient mr-1 tx-13 text-white pt- pb-"> التوجة للخطوه التالية </a>
                                </div>
                            </div>

						</fieldset>

					</form>
				</div>
			</div>
		</div>
</section>
{{-- </div> --}}
<!-- /row -->
<!-- row closed -->
@endsection

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/plugins/wizard/script.js') }}"></script>
<script src="{{ asset('assets/plugins/wizard/main.js') }}"></script>
<script src="{{ asset('assets/plugins/wizard/jquery.steps.js') }}"></script>
@endsection
