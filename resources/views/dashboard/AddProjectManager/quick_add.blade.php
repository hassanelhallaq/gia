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
                <h5 class=" text-center"> مرحبا محمد الزرو </h5>
                <p class=" text-center "> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>
                <div class="f1-steps text-center d-flex justify-content-between">
                    <div class="f1-step active col-2 align-items-center"></div>
                    <div class="f1-step active col-2 align-items-center">
                        <div class="f1-step-icon">1</div>
                        <p> انشاء مشروع </p>
                    </div>
                    <div class="f1-step col-2 align-items-center">
                        <div class="f1-step-icon">2</div>
                        <p> التكليف </p>
                    </div>
                    <div class="f1-step active co-6 align-items-center"></div>
                </div>
                <div class="card p-4">
                    <div class="body-cord">
                        {{-- ############# fieldset 1    نموذج انشلء مشروع المشروع ########### --}}
                        <fieldset>

                            <h5 class=" text-center mt-3 mb-5"> نموذج انشاء مشروع </h5>
                            <div class="row mt-5">

                                <div class="col-6">

                                    <label class="wizard-form-text-label mb-5 rdiobox"><input name="rdio"
                                           id="public_sector"
                                            type="radio"> <span> القطاع العام </span></label>
                                </div>
                                <div class="col-6 ">
                                    <label class="rdiobox mb-5"><input
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

                                <div class="col-lg-6">
                                    <p class="mg-b-10"> العملاء</p>
                                    <select class="form-control select2" id="client_id">
                                        @foreach ($clients as $item)
                                        <option value="{{$item->id}}"> {{$item->name}}</option>
                                        @endforeach
                                    </select>
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
                                            <a href="#" class="input-group-text"><i class="bi bi-person"></i></a>
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
                                        onclick="performStoreProject()"> حفظ بيانات المشروع </button>
                                    <button type="button" class="btn btn-outline-warning btn-next "> المتابعة لاصدار
                                        تكليف </button>
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
                                    @foreach ($adminsMangs as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 mb-4">
                                    <p class="mg-b-10"> يرجي اختيار منسق المشروع </p>
                                    <select class="form-control select2" id="cord_select">
                                        @foreach ($admins as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

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








        function performStoreFinal() {
            let formData = new FormData();
            formData.append('info', document.getElementById('info').value);
            formData.append('program_files', document.getElementById('program_files').files[0]);
            storeRoute('/dashboard/admin/programWizardUpdate', formData)
        }

        function performStore() {

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

        function performStoreProject() {
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
            formData.append('client_id', document.getElementById('client_id').value);
            formData.append('excel_file', document.getElementById('excel_file').files[0]);



            store('/dashboard/admin/quick-program/store', formData)
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
