@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <h5 class=" text-center mt-3 mb-5"> نموذج انشاء مشروع </h5>
                        <div class="row mt-5">
                            <div class="col-6">

                                <label class="wizard-form-text-label mb-5 rdiobox"><input name="rdio"
                                        @if ($program->public_sector == 'public_sector') checked="" @endif id="public_sector"
                                        type="radio"> <span> القطاع
                                        العام </span></label>
                            </div>
                            <div class="col-6 ">
                                <label class="rdiobox mb-5"><input @if ($program->sector_type == 'private_sector') checked @endif
                                        name="rdio" id="private_sector" type="radio"> <span> القطاع الخاص
                                    </span></label>
                            </div>




                            <div class="col-3">
                                <label class="rdiobox mb-5"><input @if( $program->colsntunt == 'tranning') checked="" @endif id="tranning" name="rdioType"
                                        type="radio">
                                    <span> التدريب </span></label>
                            </div>
                            <div class="col-3">
                                <label class="rdiobox mb-5"><input @if( $program->colsntunt == 'tranning_and_colustant') checked="" @endif  id="tranning_and_colustant"
                                        name="rdioType" type="radio">
                                    <span> التدريب والاستشارات </span></label>
                            </div>
                            <div class="col-3">
                                <label class="rdiobox mb-5"><input @if( $program->colsntunt == 'colustant') checked="" @endif id="colustant" name="rdioType"
                                        type="radio">
                                    <span> الاستشارات </span></label>
                            </div>
                            <div class="col-3">
                                <label class="rdiobox mb-5"><input @if( $program->colsntunt == 'other_type') checked="" @endif id="other_type" name="rdioType"
                                        type="radio">
                                    <span> خدمات اخري </span></label>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> عنوان اسم المشروع *</label>
                                    <input type="text" value="{{ $program->name }}" class="form-control wizard-required"
                                        id="name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname2" class="wizard-form-text-label"> رقم العقد *</label>
                                    <input type="text" value="{{ $program->contract_number }}"
                                        class="form-control wizard-required" id="contract_number">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <p class="mg-b-10"> اسم المستخدم </p>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <a href="#" class="input-group-text"><i class="bi bi-person"></i></a>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username"
                                        value="{{ $program->username }}" id="username" class="form-control"
                                        placeholder=" اسم المستخدم " type="text">
                                </div>
                            </div>




                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname4" class="wizard-form-text-label"> تاريخ البدأ *</label>
                                    <input type="date" class="form-control wizard-required" value="{{ $program->start }}"
                                        id="start">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname55" class="wizard-form-text-label"> تاريخ الانتهاء *</label>
                                    <input type="date" class="form-control wizard-required" value="{{ $program->end }}"
                                        id="end">
                                </div>
                            </div>

                            <div class="col-6">
                                <p class="mg-b-10">حدد قالب الدعوة</p>
                                <select class="form-control select2" id="theme_name">
                                    <option @if ($program->theme_name == 'A1') selected @endif value="A1">
                                        A1
                                    </option>
                                    <option @if ($program->theme_name == 'A2') selected @endif value="A2">
                                        A2
                                    </option>
                                </select>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname5" class="wizard-form-text-label"> عدد الدورات في المشروع
                                        *</label>
                                    <input type="nuumber" class="form-control wizard-required"
                                        value="{{ $program->courses_count }}" id="courses_count">
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname6" class="wizard-form-text-label"> عدد المتدربين الاجمالي
                                        *</label>
                                    <input type="number" class="form-control wizard-required"
                                        value="{{ $program->trainers_count }}" id="trainers_count">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fname7" class="wizard-form-text-label"> مقر تنفيذ المشروع مقر العمل
                                        / مقر مركز التدريب *</label>
                                    <input type="text" class="form-control wizard-required"
                                        value="{{ $program->training_center }}" id="training_center">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="fname8" class="wizard-form-text-label"> الخدمات اللوجستية *</label>
                                    <input type="text" class="form-control wizard-required"
                                        value="{{ $program->logistics_services }}" id="logistics_services">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <p class="mg-b-10"> طريقة التسجيل </p>
                                <select class="form-control select2" id="attendance_method">
                                    <option @if ($program->attendance_method == 'من خلال صفحة الهبوط ') selected @endif value="من خلال صفحة الهبوط ">
                                        من خلال صفحة
                                        الهبوط </option>
                                    <option @if ($program->attendance_method == 'من خلال المنصة فقط ') selected @endif value="من خلال المنصة فقط ">
                                        من خلال المنصة
                                        فقط </option>
                                    <option @if ($program->attendance_method == 'جميع الخيارات ') selected @endif value="جميع الخيارات "> جميع
                                        الخيارات
                                    </option>

                                </select>
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-3">

                            </div>

                            <div class="col-3">
                                <label class="wizard-form-text-label mb-5 rdiobox"><input
                                        @if ($program->logistic == 'coffe_break') checked @endif name="rdio" id="coffe_break"
                                        type="radio"> <span> كوفي بريك </span></label>
                            </div>
                            <div class="col-3">
                                <label class="rdiobox mb-5"><input @if ($program->logistic == 'lanch') checked="" @endif
                                        id="lanch" name="rdio" type="radio">
                                    <span> غداء </span></label>
                            </div>
                            <div class="col-3">
                                <label class="rdiobox mb-5"><input @if ($program->logistic == 'other') checked="" @endif
                                        id="other" name="rdio" type="radio">
                                    <span> اخري حدد </span></label>
                            </div>

                            <div class="col-12 col-sm-12">
                                <label for="exampleInputEmail1"> إدراج ملف (صورة / ملف pdf) </label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="prog_file">
                                    <label class="input-group-text" for="address">Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4 justify-content-between d-flex">
                            <div class="d-flex">
                                <button class="btn ml-1 btn-warning-gradient btn-with-icon"
                                    onclick="update({{ $program->id }})"> تحديث بيانات المشروع </button>

                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/wizard/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/wizard/js/retina-1.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/wizard/js/scripts.js') }}"></script>

    <script>
        function update(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', document.getElementById('name').value);
            formData.append('contract_number', document.getElementById('contract_number').value);
            formData.append('username', document.getElementById('username').value);
            formData.append('start', document.getElementById('start').value);
            formData.append('end', document.getElementById('end').value);
            formData.append('courses_count', document.getElementById('courses_count').value);
            formData.append('trainers_count', document.getElementById('trainers_count').value);
            formData.append('theme_name', document.getElementById('theme_name').value);
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
            storeRoute('/dashboard/admin/programs/' + id, formData)
        }
    </script>
@endsection
