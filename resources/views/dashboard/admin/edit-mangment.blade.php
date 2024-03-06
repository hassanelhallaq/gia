@extends('dashboard.layouts.master')
@section('content')
    <div class="row m-auto">
        <div class="col-sm-10  m-auto">
            <div class="card p-4">
                <div class="body-cord">
                    @if ($adminManger->type == 'manger')
                        <fieldset>
                            <div id="cart-create-mp" class="cart-create-mp" style="display: none">
                                <h5 class=" text-center mt-3 mb-5"> نموذج اضافة مدير المشروع </h5>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                                *</label>
                                            <input type="text" class="form-control wizard-required" value="{{$admin->name}}" id="manager_name">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                                *</label>
                                            <input type="text" value="{{$admin->english_name}}" class="form-control wizard-required"
                                                id="english_name_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                            <input type="text" value="{{$admin->nationality}}" class="form-control wizard-required"
                                                id="manager_nationality">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                            <input type="date" value="{{$admin->birthday}}" class="form-control wizard-required" id="birthday_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية
                                                *</label>
                                            <input type="text" value="{{$admin->academicـcertificate}}" class="form-control wizard-required"
                                                id="academicـcertificate_manger">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي
                                                *</label>
                                            <input type="text" value="{{$admin->main_field_of_consulting}}" class="form-control wizard-required"
                                                id="main_training_area_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                            <input type="text" value="{{$admin->accreditation}}" class="form-control wizard-required"
                                                id="accreditation_manger">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                            <input type="number"  value="{{$admin->years_of_experience}}" class="form-control wizard-required"
                                                id="years_of_experience_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                            <input type="number" class="form-control wizard-required"  value="{{$admin->phone}}" id="phone_manger">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني
                                                *</label>
                                            <input type="email" class="form-control wizard-required" value="{{$admin->email}}" id="email_manger">
                                        </div>
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


                                </div>

                                <div class="row mb-3 mt-4 justify-content-between d-flex">

                                    <div class="d-flex">
                                        <button type="button" onclick="performStoreManger({{$admin->id}})"
                                            class="btn  btn-warning-gradient btn-next"> حفظ </button>
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                    @endif
                    @if ($adminManger->type == 'cordreator')
                        <fieldset>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            value="{{ $admin->name }}" id="cord_name">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            value="{{ $admin->english_name }}" id="cord_name_english">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            value="{{ $admin->nationality }}" id="nationality_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" class="form-control wizard-required"
                                            value="{{ $admin->birthday }}" id="birthday_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required"
                                            value="{{ $admin->academicـcertificate }}" id="academicـcertificate_cord">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الوظيفة الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required"
                                            value="{{ $admin->main_field_of_consulting }}" id="main_job_field_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> الاعتماد *</label>
                                        <input type="text" class="form-control wizard-required"
                                            value="{{ $admin->accreditation }}" id="accreditation_cord">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required"
                                            value="{{ $admin->years_of_experience }}" id="years_of_experience_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required"
                                            value="{{ $admin->phone }}" id="phone_cord">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required"
                                            value="{{ $admin->email }}" id="email_cord">
                                    </div>
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


                            <div class="row mb-3 mt-4 justify-content-between d-flex">

                                <div class="d-flex">
                                    <button type="button" onclick="performStoreCord({{$admin->id}})"
                                        class="btn  btn-warning-gradient btn-next"> تحديث
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    @endif

                    @if ($adminManger->type == 'cord-trainner')
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسقو التدريب </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" value="{{$admin->name}}" class="form-control wizard-required"
                                            id="cord_trainer_name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" value="{{$admin->english_name}}" class="form-control wizard-required"
                                            id="cord_trainer_name_english">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" value="{{$admin->nationality}}" class="form-control wizard-required"
                                            id="cord_trainer_nationality">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" value="{{$admin->birthday}}" class="form-control wizard-required"
                                            id="cord_trainer_birthday">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" value="{{$admin->academicـcertificate}}" class="form-control wizard-required"
                                            id="cord_trainer_academicـcertificate">
                                    </div>
                                </div>




                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي
                                            *</label>
                                        <input type="text" value="{{$admin->main_training_area}}" class="form-control wizard-required"
                                            id="cord_trainer_main_training_area">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" value="{{$admin->years_of_experience}}"
                                            id="cord_trainer_years_of_experience">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" value="{{$admin->phone}}"
                                            id="cord_trainer_phone">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" value="{{$admin->email}}"
                                            id="cord_trainer_email">
                                    </div>
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

                                <div class="d-flex">
                                    <button type="button" onclick="performStoreCordTrainer({{$admin->id}})"
                                        class="btn  btn-warning-gradient btn-next"> حفظ</button>
                                </div>
                            </div>
                        </fieldset>
                    @endif

                    @if ($adminManger->type == 'consultants')
                        <fieldset>
                            <h5 class=" text-center mt-3 mb-5"> نموذج اضافة المستشارون </h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                            *</label>
                                        <input type="text" class="form-control wizard-required" value="{{$admin->name}}" id="name">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname2" class="wizard-form-text-label"> Full Name in English
                                            *</label>
                                        <input type="text" class="form-control wizard-required" id="name_english" value="{{$admin->english_name}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname3" class="wizard-form-text-label"> الجنسية *</label>
                                        <input type="text" class="form-control wizard-required" id="nationality" value="{{$admin->nationality}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname4" class="wizard-form-text-label"> تاريخ الولادة *</label>
                                        <input type="date" class="form-control wizard-required" id="birthday" value="{{$admin->birthday}}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname55" class="wizard-form-text-label"> الشهادة الأكاديمية *</label>
                                        <input type="text" class="form-control wizard-required" value="{{$admin->academicـcertificate}}"
                                            id="academicـcertificate">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال الاستشارات الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required" value="{{$admin->main_field_of_consulting}}"
                                            id="main_field_of_consulting">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname5" class="wizard-form-text-label"> مجال التدريب الرئيسي
                                            *</label>
                                        <input type="text" class="form-control wizard-required" value="{{$admin->main_training_area}}"
                                            id="main_training_area">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname6" class="wizard-form-text-label"> سنوات الخبرة *</label>
                                        <input type="number" class="form-control wizard-required" value="{{$admin->years_of_experience}}"
                                            id="years_of_experience">
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname7" class="wizard-form-text-label"> رقم الجوال *</label>
                                        <input type="number" class="form-control wizard-required" value="{{$admin->phone}}" id="phone">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                        <input type="email" class="form-control wizard-required" value="{{$admin->email}}" id="email">
                                    </div>
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


                            <div class="row mb-3 mt-4 justify-content-between d-flex">

                                <div class="d-flex">
                                    <button type="button" onclick="performStore({{$admin->id}})"
                                        class="btn  btn-warning-gradient btn-next"> حفط</button>
                                </div>
                            </div>
                        </fieldset>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function performStoreCord(id) {
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
            formData.append('cv', document.getElementById('cv_cord').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate_cord').files[
                0]);
            formData.append('pic', document.getElementById('pic_cord').files[0]);
            formData.append('type', 'cordreator');

            store('/dashboard/admin/updateMangment/'+id, formData)
        }

        function performStoreManger(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('manager_name').value);
            formData.append('name_english', document.getElementById('english_name_manger').value);
            formData.append('nationality', document.getElementById('manager_nationality').value);
            formData.append('birthday', document.getElementById('birthday_manger').value);
            formData.append('academicـcertificate', document.getElementById('academicـcertificate_manger').value);
            formData.append('main_training_area', document.getElementById('main_training_area_manger').value);
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

            store('/dashboard/admin/updateMangment/'+id, formData)
        }

        function performStoreCordTrainer(id) {
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
            formData.append('cv', document.getElementById('cord_trainer_cv').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('cord_trainer_accreditation').files[0]);
            formData.append('pic', document.getElementById('cord_trainer_pic').files[0]);
            formData.append('type', 'cord-trainner');

            store('/dashboard/admin/updateMangment/'+id, formData)
        }

        function performStore(id) {

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
             formData.append('cv', document.getElementById('cv').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate').files[0]);
            formData.append('pic', document.getElementById('pic').files[0]);
            formData.append('type', 'consultants');

            store('/dashboard/admin/updateMangment/'+id, formData)
        }
    </script>
@endsection
