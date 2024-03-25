@extends('dashboard.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row m-auto">
        <div class="col-sm-10  m-auto">
            <form role="form" action="" method="post" class="f1">
                <h5 class=" text-center"> مرحبا {{ Auth::user()->name }} </h5>
                <p class=" text-center "> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>
                <div class="card p-4">
                    <div class="body-cord">
                        <div class="row mt-2 pb-2 brd-btn">
                            <div class="col-lg-4  col-sm-12 mb-3">
                                <label class="wizard-form-text-label  rdiobox"><input name="rdio" id="public_sector"
                                        value="public_sector" type="radio"> <span> القطاع العام </span></label>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-3">
                                <label class="rdiobox "><input checked="" name="rdio" id="private_sector"
                                        value="private_sector" type="radio"> <span> القطاع الخاص </span></label>
                            </div>
                            <div class="col-lg-4 col-sm-12 mr-auto float-left">
                                <input type="file" id="logo" class="btn  btn-warning-gradient  btn-sm  mt-0"> إدراج
                                شعار العميل </button>
                            </div>

                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> اسم الجهة / العميل *</label>
                                    <input type="text" class="form-control wizard-required" id="name">
                                </div>
                            </div>

                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> الإدارة المباشرة*</label>
                                    <input type="text" class="form-control wizard-required" id="mangment">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3 brd-btn">
                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> المدير العام / التنفيذي *</label>
                                    <input type="text" class="form-control wizard-required" id="manager">
                                </div>
                            </div>

                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> رقم الجوال *</label>
                                    <input type="text" class="form-control wizard-required" id="phone">
                                </div>
                            </div>



                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> رقم الهاتف *</label>
                                    <input type="number" class="form-control wizard-required" id="phone_number">
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2 brd-btn">
                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> ممثل العمل في المشروع *</label>
                                    <input type="text" class="form-control wizard-required" id="manager">
                                </div>
                            </div>

                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> رقم الجوال *</label>
                                    <input type="text" class="form-control wizard-required" id="phone">
                                </div>
                            </div>


                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                    <input type="text" class="form-control wizard-required" id="email">
                                </div>
                            </div>

                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> رقم الهاتف *</label>
                                    <input type="number" class="form-control wizard-required" id="phone_number">
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2 brd-btn">
                            <label>بيانات المستخدم
                            </label>
                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> البريد الإلكتروني *</label>
                                    <input type="text" class="form-control wizard-required" id="email">
                                </div>
                            </div>
                            <div class="col-md-3 col-g-3 col-sm-6">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> كلمه المرور *</label>
                                    <input type="password" class="form-control wizard-required" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 col-g-6 col-sm-12 ">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> الدولة *</label>
                                    <select class="form-control select2" id="country_id">
                                        <option value="">

                                        </option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-g-6 col-sm-12">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> المدينة *</label>
                                    <select class="form-control select2" id="city_id">
                                        <!-- Cities will be populated dynamically using JavaScript -->
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3 col-g-3 col-sm-6">
                                <div class="form-group">
                                    <label for="fname1" class="wizard-form-text-label"> رابط الموقع *</label>
                                    <input type="text" class="form-control wizard-required" id="url">

                                </div>
                            </div>
                            <hr>


                            <div class="col-12 col-sm-12">
                                <label for="exampleInputEmail1"> إدراج العنوان الوطني (صورة / ملف pdf) </label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="address">
                                    <label class="input-group-text" for="address">Upload</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                        <div class="col-6">
                            <label  class="wizard-form-text-label mb-5 rdiobox"><input name="rdio" type="radio"> <span> القطاع  العام </span></label>
                        </div>
                        <div class="col-6 ">
                            <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio"> <span> القطاع الخاص </span></label>
                        </div>
                        <div class="col-xl-12 col-lg-6 col-sm-6 col-md-6">
                            <label class="" for="fname4" class="wizard-form-text-label">  إدراج ملف العميل ( ملف excel) *</label>
							<a href="#" class="card text-center bg-white border-warning">
								<div class="card-body p-1">
									<div class="feature widget-2 text-center mt-0">
                                        <input type="file" class="dropify" data-height="80" />
									</div>
								</div>

							</a>
						</div>
                        <div class="row mb-3 mt-4  pl-3  mr-auto float-left">

                            <div class="d-flex">
                                <button class="btn ml-1 btn-warning-gradient btn-with-icon"> حفظ بيانات العميل  </button>
                            </div>
                        </div>

                    </div> --}}
                        <div class="row justify-content-between d-flex mt-5">
                            <div class="">
                                <button type="button" onclick="performStore()"
                                    class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> حفظ <i
                                        class="bi bi-plus"></i></button>
                            </div>
                            {{-- <div class="">
                            <button class="btn btn-warning-gradient btn-with-icon  mr-1">  إضافة جهة  <i class="bi bi-plus"></i></button>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script>
        function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('country_id', document.getElementById('country_id').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('mangment', document.getElementById('mangment').value);
            formData.append('url', document.getElementById('url').value);
            formData.append('manager', document.getElementById('manager').value);
            formData.append('public_sector', document.getElementById('public_sector').checked);
            formData.append('private_sector', document.getElementById('private_sector').checked);
            formData.append('logo', document.getElementById('logo').files[0]);
            formData.append('address', document.getElementById('address').files[0]);
            storeRoute('/dashboard/admin/clients', formData)
        }
        $(document).ready(function() {
            // Triggered when the country selection changes
            $('#country_id').change(function() {
                // Get the selected country ID
                var countryId = $(this).val();

                // Make an Ajax request to get cities for the selected country
                $.ajax({
                    url: '/dashboard/admin/get-cities/' +
                    countryId, // Replace with the actual endpoint on your server
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options in the city dropdown
                        $('#city_id').empty();

                        // Populate the city dropdown with the received data
                        $.each(data, function(key, value) {
                            $('#city_id').append('<option value="' + value.id + '">' +
                                value.name_ar + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities: ' + error);
                    }
                });
            });
        });
    </script>
@endsection
