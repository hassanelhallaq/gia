@extends('dashboard.layouts.master')
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0" style="border-top: 1px solid #00000030;">
    <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="../index.html" >الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="table_program_management.html"class="text-muted">البرامج</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> برنامج تطوير المهارات الشخصية </a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">
        <div class=" d-flex">
            <a href="add_tests.html" class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> اضافة اسئلة <i class="bi bi-plus"></i></a>
            <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1" data-target="#select2modal" data-toggle="modal"> اضافة اختبار جديد <i class="bi bi-plus"></i></button>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid mt-3">
    <!-- row -->
    <div class="row table-tabs">
        <!--open filter and Tap <Top>  -->
        <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="row card-body  p-3">
                    <div class="col-lg-6 col-sm-12 tab-menu-heading mb-3">
                        <div class="tabs-menu">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs mt-2 mt-sm-6">
                                <li class="ml-3"><a href="#tab11" class="active" data-toggle="tab">  الأختبار القبلي  </a></li>
                                <li class="ml-3"><a href="#tab12" data-toggle="tab"> الأختبار البعدي  </a></li>
                                <li class="ml-3"><a href="#tab13" data-toggle="tab"> الأختبار التفاعلي  </a></li>
                            </ul>
                        </div>
                    </div>
                    <!--input Search -->

                </div>
            </div>
        </div>
        <!--closed filter Top  -->

        <!-- table -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane active table-container" id="tab11">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="checkParent"></th>
                                            <th>#</th>
                                            <th class="tx-15">
                                                اسم الأختبار
                                           </th>
                                           <th class="tx-5">عدد الدورات المرتبطة </th>
                                           <th> نوع السؤال </th>
                                           <th>عدد التسجيلات</th>
                                           <th>حالات مقدمة</th>
                                           <th>حالات لم تقدم</th>
                                           <th>الاكتمال</th>
                                           <th>
                                               <div class="dropdown">
                                                   <i aria-expanded="false" aria-haspopup="true" class="bi bi-filter-square tx-20"data-toggle="dropdown" id="dropdownMenuButton" type="button"></i></i>
                                                   <div  class="dropdown-menu tx-13">
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                   </div>
                                               </div>
                                           </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none empty-message"> لايوجد  </p>
                                        </tr>
                                        <tr class="table-rows">
                                            <td><input type="checkbox" class="checkChild"></td>
                                            <td>1</td>
                                            <td scope="row"> مادة </td>
                                            <td>6 دورات</td>
                                            <td> اختبار قبلي </td>
                                            <td>12</td>
                                            <td>50</td>
                                            <td>40</td>
                                            <td>90%</td>
                                            <td class="d-flex filter-col-cell">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i class="si si-options-vertical text-gray tx-13" ></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item" data-target="#modaledit" data-toggle="modal"> تحرير </a>
                                                    <a href="questions_and_tests_management.html" class="dropdown-item" > عرض </a>
                                                    <a href="#" class="dropdown-item text-danger"data-target="#modalDelete" data-toggle="modal"> حذف </a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane table-container" id="tab12">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="checkParent"></th>
                                            <th>#</th>
                                            <th class="tx-15">
                                                اسم الأختبار
                                           </th>
                                           <th class="tx-5">عدد الدورات المرتبطة </th>
                                           <th> نوع السؤال </th>
                                           <th>عدد التسجيلات</th>
                                           <th>حالات مقدمة</th>
                                           <th>حالات لم تقدم</th>
                                           <th>الاكتمال</th>
                                           <th>
                                               <div class="dropdown">
                                                   <i aria-expanded="false" aria-haspopup="true" class="bi bi-filter-square tx-20"data-toggle="dropdown" id="dropdownMenuButton" type="button"></i></i>
                                                   <div  class="dropdown-menu tx-13">
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                   </div>
                                               </div>
                                           </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none empty-message"> لايوجد  </p>
                                        </tr>
                                        <tr class="table-rows">
                                            <td><input type="checkbox" class="checkChild"></td>
                                            <td>1</td>
                                            <td scope="row"> مادة </td>
                                            <td>6 دورات</td>
                                            <td> اختبار بعدي </td>
                                            <td>12</td>
                                            <td>50</td>
                                            <td>40</td>
                                            <td>90%</td>
                                            <td class="d-flex filter-col-cell">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i class="si si-options-vertical text-gray tx-13" ></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item" data-target="#modaledit" data-toggle="modal"> تحرير </a>
                                                    <a href="questions_and_tests_management.html" class="dropdown-item" > عرض </a>
                                                    <a href="#" class="dropdown-item text-danger"data-target="#modalDelete" data-toggle="modal"> حذف </a>
                                                </div>
                                            </td>

                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane table-container" id="tab13">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="checkParent"></th>
                                            <th>#</th>
                                            <th class="tx-15">
                                                اسم الأختبار
                                           </th>
                                           <th class="tx-5">عدد الدورات المرتبطة </th>
                                           <th> نوع السؤال </th>
                                           <th>عدد التسجيلات</th>
                                           <th>حالات مقدمة</th>
                                           <th>حالات لم تقدم</th>
                                           <th>الاكتمال</th>
                                           <th>
                                               <div class="dropdown">
                                                   <i aria-expanded="false" aria-haspopup="true" class="bi bi-filter-square tx-20"data-toggle="dropdown" id="dropdownMenuButton" type="button"></i></i>
                                                   <div  class="dropdown-menu tx-13">
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                       <p class="dropdown-item" href="#"><label class="ckbox"><input type="checkbox"><span>Checkbox Unchecked</span></label></p>
                                                   </div>
                                               </div>
                                           </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <p class="p-5 text-center d-none empty-message"> لايوجد  </p>
                                        </tr>

                                        <tr class="table-rows">
                                            <td><input type="checkbox" class="checkChild"></td>
                                            <td>1</td>
                                            <td scope="row"> مادة </td>
                                            <td>6 دورات</td>
                                            <td> اختبار تفاعلي </td>
                                            <td>12</td>
                                            <td>50</td>
                                            <td>40</td>
                                            <td>90%</td>
                                            <td class="d-flex filter-col-cell">
                                                <!-- dropdown-menu -->
                                                <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i class="si si-options-vertical text-gray tx-13" ></i></button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item" data-target="#modaledit" data-toggle="modal"> تحرير </a>
                                                    <a href="questions_and_tests_management.html" class="dropdown-item" > عرض </a>
                                                    <a href="#" class="dropdown-item text-danger"data-target="#modalDelete" data-toggle="modal"> حذف </a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- table -->


        <!--open filter bottom  -->
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <ul class="pagination mb-0">
                        
                    </ul>

                </div>
            </div>
        </div>
        <!--closed filter bottom  -->
    </div>
    <!-- row closed -->
</div>
<div class="modal" id="select2modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة اختبار جديد</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col  d-flex justify-content-between flex-wrap">
                            <label class="rdiobox"><input name="rdio" id="befor"   type="radio"> <span> اختبار قبلي </span></label>
                            <label class="rdiobox"><input checked="" id="after"  name="rdio" type="radio"> <span> اختبار بعدي </span></label>
                            <label class="rdiobox"><input   id="interactive"    name="rdio" type="radio"> <span> اختبار تفاعلي </span></label>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="example"> اسم الأختبار </label>
                            <input class="form-control" required="" id="name" type="text">
                        </div>
                        <div class="col-12 mt-4">
                            <p class="mg-b-10"> الدوره </p>
                            <select class="form-control select2" id="course_id">
                                <option value="">
                                </option>
                                @foreach ($courses as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performStore()"> حفظ <i class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>



    function performStore() {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('course_id', document.getElementById('course_id').value);
            formData.append('befor', document.getElementById('befor').checked);
            formData.append('after', document.getElementById('after').checked);
            formData.append('interactive', document.getElementById('interactive').checked);

            storeRoute('/dashboard/admin/quizes', formData)
        }
</script>
@endsection
