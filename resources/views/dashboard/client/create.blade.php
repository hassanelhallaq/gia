@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid mt-3">
        <!-- row -->
        <div class="row">
            <div class="col-lg-10 col-sm-12 m-auto">
                <form action="" method="post">
                    <div class="card pos-relative">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-8 mb-4">
                                    <label for="example"> الاسم </label>
                                    <input class="form-control" required="" id="name" type="text">
                                </div>

                                <div class="col-lg-4 mb-4">
                                    <p class="mg-b-10"> الدوله </p>
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

                                <div class="col-lg-4 mb-4">
                                    <p class="mg-b-10"> المدينة </p>
                                    <select class="form-control select2" id="city_id">
                                        <!-- Cities will be populated dynamically using JavaScript -->
                                    </select>
                                </div>


                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10"> الشارع </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="street"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10"> البريد الالكتروني </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="email"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10"> رقم الهاتف </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="phone_number"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <p class="mg-b-10">كلمه المرور </p>

                                    <div
                                        class=" ht-lg-45 ht-sm-70 bd bd-gray-40 pl-2 rounded-5 d-lg-flex d-sm-block justify-content-between">
                                        <input class="form-control border-0"  id="password"
                                            type="password">
                                    </div>
                                </div>

                            </div>




                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performStore()"> حفظ <i
                                class="bi bi-floppy"></i></button>
                    </div>
                </form>

            </div>
        </div>
        <!-- row closed -->



    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        // Triggered when the country selection changes
        $('#country_id').change(function () {
            // Get the selected country ID
            var countryId = $(this).val();

            // Make an Ajax request to get cities for the selected country
            $.ajax({
                url: '/dashboard/admin/get-cities/' + countryId, // Replace with the actual endpoint on your server
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Clear existing options in the city dropdown
                    $('#city_id').empty();

                    // Populate the city dropdown with the received data
                    $.each(data, function (key, value) {
                        $('#city_id').append('<option value="' + value.id + '">' + value.name_ar + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching cities: ' + error);
                }
            });
        });
    });


    function performStore() {






            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('country_id', document.getElementById('country_id').value);
            formData.append('city_id', document.getElementById('city_id').value);
            formData.append('street', document.getElementById('street').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('phone_number', document.getElementById('phone_number').value);

            storeRoute('/dashboard/admin/clients', formData)
        }
</script>
@endsection
