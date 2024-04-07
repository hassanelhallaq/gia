@extends('dashboard.layouts.master')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css-rtl/chartCircle.css') }}" rel="stylesheet" />
@endsection
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 mb-0 mr-0">

        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('programs.index') }}"class="text-muted">المشاريع</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right flex-wrap">
            <a href="{{ route('candidat.xlsx', [$id]) }}"
                class="btn btn-outline-light btn-with-icon btn-sm mr-1 btn-export mb-1"> تصدير <i
                    class="ti-stats-up project"></i></a>
                    <a
                    href="{{ route('candidat.course.accetptance', [$id]) }}"class="btn btn-outline-light btn-with-icon btn-sm mr-1">
                    اداره القبول <i class="bi bi-clipboard-data tx-11"></i></a>
                    {{-- <a
                    href="{{ route('candidat2') }}"class="btn btn-outline-light btn-with-icon btn-sm mr-1">
                    اداره القبول 2<i class="bi bi-clipboard-data tx-11"></i></a> --}}
            <button class="btn btn-outline-light btn-with-icon btn-sm mr-1" data-target="#choseAttendType"
                data-toggle="modal">
                اضافة مشاركين جدد <i class="bi bi-plus"></i></button>
            <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1" data-target="#sendSms" data-toggle="modal">
                ارسال دعوة جماعية <i class="icon ion-md-paper-plane"></i></button>
            <button class="btn btn-warning-gradient btn-with-icon btn-sm mr-1" data-target="#sendSmsSelected"
                data-toggle="modal"> ارسال دعوة محددة <i class="icon ion-md-paper-plane"></i></button>
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/css-rtl/drawar-user.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">

        <!--open filter Top  -->
        <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <form method="get">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            {{-- <span class="right-pan"><i class="bi bi-sliders"></i></span> --}}
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <input type="text" class="form-control form-input" name="seacrh_name"
                                            value="{{ request()->seacrh_name }}" id="seacrh_name" placeholder="بحث">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <button class="btn btn-outline-light btn-print" type="submit"> بحث </button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <!--closed filter Top  -->

        <!-- table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr class="tableHead">
                                    {{-- <th><input type="checkbox" class="checkParent"></th> --}}
                                    <th>#</th>
                                    <th> اسم المشارك </th>
                                    <th> رقم الهاتف</th>
                                    <th> البريد الإلكتروني</th>
                                    <th> المسمى الوظيفي</th>
                                    <th> أسم القسم</th>
                                    <th> القسم الفرعي</th>
                                    <th>    </th>

                                    {{-- <th>  اضافه للدوره </th> --}}
                                    <td class="col-filter">
                                        <!-- dropdown-menu -->
                                        <button data-toggle="dropdown" class="btn btn-previous p-0"><i
                                                class="bi bi-filter-square tx-20"></i></button>
                                        <div class="dropdown-menu scrollable-menu">
                                        </div>
                                    </td>
                                    <!-- Filter -->
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr>
                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها</p>
                                </tr>
                                @foreach ($candidat as $i => $item)
                                    <tr class="table-rows">
                                        <td scope="row"> {{ $i + 1 }} </td>
                                        <td scope="row"> {{ $item->name }} </td>
                                        <td class="client-name"> {{ $item->phone_number }} </td>
                                        <td class="client-name"> {{ $item->email }} </td>
                                        <td class="client-name"> {{ $item->job }} </td>
                                        <td class="client-name"> {{ $item->department }} </td>
                                        <td class="client-name"> {{ $item->scound_department }} </td>

                                        <td><a href="{{ route('invitationV2.candidat', [$item->id]) }}"
                                            target=”_blank”><i class="far fa-eye tx-15"></i></a></td>
                                        <td class="d-flex filter-col-cell">
                                            <!-- dropdown-menu -->
                                            <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i
                                                    class="si si-options-vertical text-gray tx-13"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item"
                                                    data-target="#modaledit_{{ $item->id }}" data-toggle="modal">
                                                    تحرير </a>
                                                <a href="#"
                                                    class="dropdown-item text-danger"data-target="#modalDelete"
                                                    data-toggle="modal"> حذف </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input class="form-control" value="{{ $id}}"required="" hidden
        id="program_id" type="text">
        <!-- table -->
        <div class="modal" id="choseAttendType">
            <div class="modal-dialog " role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h5 class="modal-title"> اضافة مرشح </h5><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="">

                        <div class="modal-footer border-0">
                            <button class="btn btn-outline-light btn-with-icon btn-sm mr-1" data-dismiss="modal"
                                data-target="#excel_file" data-toggle="modal" type="button"> رفع ملف <i
                                    class="bi bi-floppy"></i></button>
                            <button class="btn btn-outline-light btn-with-icon btn-sm mr-1" data-dismiss="modal"
                                data-target="#modaladd" data-toggle="modal" type="button"> اضافه مرشح<i
                                    class="bi bi-floppy"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="excel_file">
            <div class="modal-dialog " role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h5 class="modal-title"> اضافة مرشح </h5><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <label for="example"> الملف </label>
                                    <input type="file" class="form-control" required="" id="excel_file">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-warning-gradient btn-with-icon" type="button"
                                onclick="performStoreExcel({{ $id }})"> حفظ <i
                                    class="bi bi-floppy"></i></button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="modaladd">
            <div class="modal-dialog " role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h5 class="modal-title"> اضافة مرشح </h5><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="example"> الأسم </label>
                                    <input class="form-control" required="" id="name" type="text">
                                </div>
                                <div class="col-6 mt-4">
                                    <label for="example"> رقم الهاتف </label>
                                    <input class="form-control" required="" id="phone_number" type="number">
                                </div>
                                <div class="col-6 mt-4">
                                    <label for="example"> البريد الالكتروني</label>
                                    <input class="form-control" required="" id="email" type="number">
                                </div>
                                <div class="col-12">
                                    <label for="example"> المسمى الوظيفي </label>
                                    <input class="form-control" required="" id="job" type="text">
                                </div>
                                <div class="col-12">
                                    <label for="example"> القسم  </label>
                                    <input class="form-control" required="" id="department" type="text">
                                </div>
                                <div class="col-12">
                                    <label for="example"> الفسم الفرعي  </label>
                                    <input class="form-control" required="" id="scound_department" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-warning-gradient btn-with-icon" type="button"
                                onclick="performStore({{ $id }})"> حفظ <i class="bi bi-floppy"></i></button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach ($candidat as $i => $item)
        <div class="modal" id="modaledit_{{$item->id}}">
            <div class="modal-dialog " role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h5 class="modal-title"> اضافة مرشح </h5><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="example"> الأسم </label>
                                    <input class="form-control" required="" value="{{$item->name}}" id="name" type="text">
                                </div>
                                <div class="col-6 mt-4">
                                    <label for="example"> رقم الهاتف </label>
                                    <input class="form-control" required="" value="{{$item->phone_number}}"  id="phone_number" type="number">
                                </div>
                                <div class="col-6 mt-4">
                                    <label for="example"> البريد الالكتروني</label>
                                    <input class="form-control" required="" value="{{$item->email}}"  id="email" type="number">
                                </div>
                                <div class="col-12">
                                    <label for="example"> المسمى الوظيفي </label>
                                    <input class="form-control" required="" value="{{$item->job}}"    id="job" type="text">
                                </div>
                                <div class="col-12">
                                    <label for="example"> القسم  </label>
                                    <input class="form-control" required="" value="{{$item->department}}"  id="department" type="text">
                                </div>
                                <div class="col-12">
                                    <label for="example"> الفسم الفرعي  </label>
                                    <input class="form-control" required="" value="{{$item->scound_department}}"  id="scound_department" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-warning-gradient btn-with-icon" type="button"
                                onclick="performUpdate({{ $item->id }})"> حفظ <i class="bi bi-floppy"></i></button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="modal" id="sendSms">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">

                    <form action="">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-12 form-group">
                                    <label for="example"> رساله </label>
                                    <textarea class="form-control" required="" id="massege_select" type="text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-warning-gradient btn-with-icon " type="button"
                                onclick="performStoreSms({{ $id }})"> حفظ <i class="bi bi-floppy"></i></button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="sendSmsSelected">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <form action="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="example"> رساله </label>
                                    <!-- Corrected the ID attribute to match the jQuery selector -->
                                    <textarea class="form-control" required="" id="massege" name="massege" type="text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-warning-gradient btn-with-icon send_all" type="button"
                                data-url="{{ url('/dashboard/admin/candidat-sms/selected') }}"> حفظ <i
                                    class="bi bi-floppy"></i></button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                        </div>
                    </form>candidat
                </div>
            </div>
        </div>
        <!--open filter bottom  -->
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <ul class="pagination mb-0">
                        <ul class="pagination mb-0">
                        </ul>

                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!--closed filter bottom  -->
    </div>
@endsection
@section('js')
    <script>
        function performStore(id) {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('program_id', id);
            formData.append('email', document.getElementById('email').value);
            formData.append('job', document.getElementById('job').value);
            formData.append('department', document.getElementById('department').value);
            formData.append('scound_department', document.getElementById('scound_department').value);





            storepart('/dashboard/admin/candidate', formData)
        }

        function performStoreExcel(id) {
            let formData = new FormData();
            formData.append('excel_file', document.getElementById('excel_file').files[0]);
            storepart('/dashboard/admin/candidate/upload-excel/' + id, formData)
        }

        function performDestroy(id, reference) {

            let url = '/dashboard/admin/attendance/' + id;

            confirmDestroy(url, reference);
        }

        $(document).ready(function() {
            // Unbind the click event before binding it again to prevent multiple bindings
            $('#master').off('click').on('click', function(e) {
                if ($(this).is(':checked')) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            // Unbind the click event before binding it again to prevent multiple bindings
            $('.send_all').off('click').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var join_selected_values = allVals.join(",");
                    // Corrected the typo in the next line
                    var join_selected_message = document.getElementById('massege').value;
                    console.log(join_selected_message);

                    var programId = document.getElementById('program_id').value;


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // Corrected the data parameter to send the message
                        data: {
                            ids: join_selected_values,
                            massege_select: join_selected_message,
                            program_id: programId
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '  successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            });
        });


        function performUpdate(id) {
            let formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', document.getElementById('name').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('program_id', id);
            formData.append('email', document.getElementById('email').value);
            formData.append('job', document.getElementById('job').value);
            formData.append('department', document.getElementById('department').value);
            formData.append('scound_department', document.getElementById('scound_department').value);
            storepart('/dashboard/admin/candidat/' + id, formData)
        }
        function performStoreSms(id) {
            let formData = new FormData();
            formData.append('massege', document.getElementById('massege_select').value);
            formData.append('course_id', id);

            storepart('/dashboard/admin/candidat-sms', formData)
        }Candidat
    </script>
@endsection
