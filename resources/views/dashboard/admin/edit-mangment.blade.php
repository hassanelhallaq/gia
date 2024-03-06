@extends('dashboard.layouts.master')
@section('content')
    <div class="row m-auto">
        <div class="col-sm-10  m-auto">
            <div class="card p-4">
                <div class="body-cord">
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج اضافة منسق المشروع </h5>
                        <div class="row mt-5">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> الاسم بالكامل بالعربي
                                        *</label>
                                    <input type="text" class="form-control wizard-required" value="{{ $admin->name }}"
                                        id="cord_name">
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
                                    <input type="number" class="form-control wizard-required" value="{{ $admin->phone }}"
                                        id="phone_cord">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname8" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                    <input type="email" class="form-control wizard-required" value="{{ $admin->email }}"
                                        id="email_cord">
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

                            <div class="d-flex">
                                <button type="button" onclick="performStoreCord()"
                                    class="btn  btn-warning-gradient btn-next"> تحديث
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
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
            formData.append('cv', document.getElementById('cv_cord').files[0]);
            formData.append('accreditationـcertificate', document.getElementById('accreditationـcertificate_cord').files[
                0]);
            formData.append('pic', document.getElementById('pic_cord').files[0]);
            formData.append('type', 'cordreator');

            store('/dashboard/admin/updateMangment', formData)
        }
    </script>
@endsection
