@extends('dashboard.layouts.master')

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- form opend -->
                    <form role="form" action="" method="post" class="f1">
                        <!--open one pag    -->

                        <!-- row -->
                        <div class="row row-sm mb-3">
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="exampleInputEmail1">اسم البرنامج</label>
                                    <input class="form-control" required="" id="name" value="{{ $program->name }}"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <label for="exampleInputEmail1">محتوي 1 </label>
                                <input class="form-control" required="" id="content_one"
                                    value="{{ $program->content_one }}" type="text">
                            </div>
                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row row-sm mb-3">
                            <div class="col-lg-3">
                                <label for="exampleInputEmail1">اسم العميل</label>
                                <select id="client_id" class="form-control select2">
                                    @foreach ($clients as $item)
                                        <option @if ($item->id == $program->client_id) selected @endif
                                            value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleInputEmail1">اسم المستخدم</label>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="mdi mdi-account-search"></i></span>
                                    </div><input aria-describedby="basic-addon1" aria-label="Username" id="username"
                                        value="{{ $program->username }}" class="form-control" type="text">
                                </div>
                            </div>


                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row mb-3">
                            <div class="col-lg-3 mb-3">
                                <label for="exampleInputEmail1"> يبدأ في </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" id="start"
                                        value="{{ $program->start }}" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div>

                            <div class="col-lg-3 mb-3">
                                <label for="exampleInputEmail1"> ينتهي في </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" id="end"
                                        value="{{ $program->end }}" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="inline w-100 field">
                                    <label> محتوي 2 </label>
                                    <select name="skills" multiple="" class="label ui selection fluid dropdown">
                                        <option value="2">
                                            انطلق نحو علم الادارة
                                        </option>
                                        <option value="1">
                                            انطلق نحو علم الادارة
                                        </option>
                                        <option value="3">
                                            انطلق نحو علم الادارة
                                        </option>


                                    </select>
                                </div>
                                <!-- <p class="mg-b-10">صلاحيات الوصول 1</p>
                                                <select class="form-control select2" multiple="multiple">
                                                    <option selected value="Firefox">
                                                        محمد سعيد
                                                    </option>
                                                    <option value="Chrome">
                                                        احمد علي
                                                    </option>
                                                </select> -->
                            </div> --}}
                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row mb-3">
                            <div class="col-lg-6 col-md-12 col-sm-12">
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

                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <p class="mg-b-10">طريقة التواصل</p>
                                <select class="form-control select2" id="contact_type">
                                    <option @if ($program->contact_type == 'whatsapp') selected @endif value="whatsapp">
                                        واتس اب
                                    </option>
                                    <option @if ($program->contact_type == 'sms') selected @endif value="sms">
                                        رسائل نصية
                                    </option>
                                    <option @if ($program->contact_type == 'email') selected @endif value="email">
                                        بريد الكتروني
                                    </option>
                                    <option @if ($program->contact_type == 'whatsapp&sms') selected @endif value="whatsapp&sms">
                                        واتس اب و رسائل نصية
                                    </option>
                                    <option @if ($program->contact_type == 'sms&email') selected @endif value="sms&email">
                                        رسائل نصية و بريد الكتروني
                                    </option>
                                </select>
                            </div>


                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-3">
                                <p class="mg-b-10"> طريقة التسجيل </p>
                                <select class="form-control select2" id="register">
                                    <option  @if ($program->register == 'qr') selected @endif  value="qr">
                                        كيو ان عند الحضور
                                    </option>
                                    <option  @if ($program->register == 'visit') selected @endif  value="visit">
                                        حضور
                                    </option>
                                    <option @if ($program->register == 'selfie') selected @endif value="selfie">
                                        كيو ار و صوره شخصيه
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <p class="mg-b-10"> الحاله</p>
                                <select class="form-control select2" id="status">
                                    <option  @if ($program->status == 'active') selected @endif  value="active">
                                    فعال
                                    </option>
                                    <option  @if ($program->status == 'deactive') selected @endif  value="deactive">
                                        غير فعال
                                    </option>

                                </select>
                            </div>
                            <div class="col-lg-6">
                                <p class="mg-b-10"> طريقة الحضور</p>
                                <select class="form-control select2" id="attendance_method">
                                    <option @if($program->attendance_method == 'remote') selected @endif  value="remote">
                                        عن بعد
                                    </option>
                                    <option  @if($program->attendance_method == 'immanence') selected @endif value="immanence">
                                        حضوري
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <p class="mg-b-10"> عرض اسم المدعو </p>
                                <select class="form-control select2" id="show_invited">
                                    <option @if($program->show_invited == 'yes') selected @endif  value="yes">
                                        نعم
                                    </option>
                                    <option @if($program->show_invited == 'no') selected @endif  value="no">
                                        لا
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <p>هوية العرض</p>
                            </div>
                        </div>
                        <!-- closed row -->

                        <!-- row -->
                        <div class="row mb-3">

                            <div class="col-lg-6 mb-3">
                                <label for="exampleInputEmail1"> اللون </label>
                                <input class="form-control" required="" value="{{ $program->color }}" type="color"
                                    id="color" type="text">
                            </div>


                            <div class="col-lg-3 mb-3">
                                <label for="exampleInputEmail1"> ملف الشعار </label>
                                    <input type="file" class="dropify" data-default-file="{{ asset($program->image) }}" value="{{$program->file}}" data-height="65"  />
                                <!-- <div class="custom-file">
                                    <input class="custom-file-input" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                </div> -->
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleInputEmail1"> ملف البرنامج </label>
                                <div class="custom-file">
                                    <input class="custom-file-input" class="dropify"
                                        data-default-file="{{ asset($program->file) }}" value="{{$program->file}}" id="file" type="file">
                                    <label class="custom-file-label" for="customFile">Drop files here⇬</label>
                                </div>
                            </div>
                        </div>
                        <!-- closed row -->

                        <br>

                        <div class="f1-buttons d-flex justify-content-between mt-5">
                            <div class="d-flex">
                                <button class="btn btn-warning-gradient btn-with-icon btn-sm" onclick="update({{$program->id}})" type="button" > حفظ الاعدادات <i class="bi bi-floppy"></i></button>

                                {{-- <a class="btn btn-outline-light btn-with-icon btn-sm mr-1 " id="copyButton"> استنساخ
                                    البرنامج <i class="far fa-clone"></i></a> --}}
                            </div>
                         </div>

                        <!--closed pag  one   -->



                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- closed row -->
@endsection


@section('js')
<script>
    function update(id) {
        let formData = new FormData();
        formData.append("_method", "PUT")
        formData.append('name', document.getElementById('name').value);
        formData.append('content_one', document.getElementById('content_one').value);
        formData.append('username', document.getElementById('username').value);
        formData.append('start', document.getElementById('start').value);
        formData.append('end', document.getElementById('end').value);
        formData.append('theme_name', document.getElementById('theme_name').value);
        formData.append('contact_type', document.getElementById('contact_type').value);
        formData.append('register', document.getElementById('register').value);
        formData.append('show_invited', document.getElementById('show_invited').value);
        formData.append('color', document.getElementById('color').value);
        formData.append('register', document.getElementById('register').value);
        formData.append('client_id', document.getElementById('client_id').value);
        formData.append('status', document.getElementById('status').value);


        formData.append('attendance_method', document.getElementById('attendance_method').value);
          storeRoute('/dashboard/admin/programs/'+id, formData)
    }
</script>


@endsection
