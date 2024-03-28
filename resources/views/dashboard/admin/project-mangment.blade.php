@extends('dashboard.layouts.master')
@section('header')


<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
        <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="../index.html" > الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted"> اصحاب المصلحة  </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted"> إدارة </a>
                </li>

            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">
        <div class=" d-flex">
            <!-- <button class="btn btn-outline-light btn-with-icon btn-sm ml-1"> اعضاء الإدارة <i class="bi bi-award-fill"></i></button> -->
            <a href="{{route('addMangement',[$type])}}" class="btn btn-warning-gradient btn-with-icon btn-sm"> اضافة حساب جديد <i class="bi bi-plus"></i></a>
        </div>
    </div>
</div>
@endsection
@section('content')

    <!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mg-b-20">
             <div class="card-body d-flex p-3">
                 <div class="form">
                     <i class="fa fa-search"></i>
                     <input type="text" class="form-control form-input" id="search-table"
                         placeholder="بحث">
                     <span class="right-pan"><i class="bi bi-sliders"></i></span>
                 </div>



                 <button class="btn btn-danger btn-sm btn-with-icon mr-1 text-white btnSelectDelete"data-target="#modalDelete" data-toggle="modal" style="display: none;">حذف الصفوف المختارة <i class="bi bi-trash tx-12"></i></button>

                 <div class="mr-auto d-block tx-20">
                     <a href=""><i class="typcn typcn-calendar-outline"></i></a>
                     <a href=""><i class="bi bi-grid"></i></a>
                     <a href=""><i class="bi bi-list bg-black-9 text-white"></i></a>
                 </div>
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
                                <th><input type="checkbox" class="checkParent"></th>
                                <th>#</th>
                                <th> الأسم </th>
                                <th> رقم الهاتف </th>
                                <th> البريد الألكتروني </th>
                                <!-- Filter -->
                                <td class="col-filter">
                                    <!-- dropdown-menu -->
                                    <button data-toggle="dropdown" class="btn btn-previous p-0"><i class="bi bi-filter-square tx-20"></i></button>
                                    <div class="dropdown-menu scrollable-menu" role="menu">
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        @foreach ($admins as $admin)

                        <tbody id="table-body">
                            <tr>
                                <p class="p-5 text-center d-none" id="empty-message">لا توجد
                                    بيانات لعرضها</p>
                            </tr>
                            <tr class="table-rows">
                                <td><input type="checkbox" class="checkChild"></td>
                                <td>1</td>
                                <td scope="row"> {{$admin->name}} </td>
                                <td> {{$admin->phone}} </td>
                                <td> {{$admin->email}} </td>
                                <td class="d-flex filter-col-cell">
                                    <!-- dropdown-menu -->
                                    <button data-toggle="dropdown" class="btn btn-previous btn-sm"><i class="si si-options-vertical text-gray tx-12"></i></button>
                                    <div class="dropdown-menu">
                                        <a href="{{route('mangment.edit',[$admin->id])}}" class="dropdown-item" > تحرير </a>
                                        {{-- <a href="#" class="dropdown-item text-danger"data-target="#modalDelete" data-toggle="modal"> حذف </a> --}}
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                        @endforeach

                    </table>
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
                    {!! $admins->links() !!}

                 </ul>


             </div>
         </div>
     </div>
     <!--closed filter bottom  -->
</div>
<!-- row closed -->
<div class="modal" id="modalAddRoles">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة صلاحية جديدة</h5><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col-12 mb-3">
                            <label for="example"> اسم الصلاحية </label>
                            <input class="form-control" required="" type="text">
                        </div>
                        <div class="col-12 mb-3 border-bottom-1 pb-2">
                            <h6>اعضاء الأدارة</h6>
                            <div class="row">
                                <div class="col-4"><label><input type="checkbox"> <span> تحرير الاعدادات
                                        </span></label></div>
                                <div class="col-4"><label><input checked="" type="checkbox"> <span> اضافة اعضاء
                                        </span></label></div>
                                <div class="col-4"><label><input type="checkbox"> <span> اضافة برنامج </span></label>
                                </div>
                                <div class="col-4"><label><input checked type="checkbox"> <span> تحرير برنامج
                                        </span></label></div>
                                <div class="col-4"><label><input checked type="checkbox"> <span> حذف اعضاء
                                        </span></label></div>
                                <div class="col-4"><label><input type="checkbox"> <span> خيارات اخري </span></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3 border-bottom-1 pb-2">
                            <h6> المدربين </h6>
                            <div class="row">
                                <div class="col-4"><label><input checked type="checkbox"> <span class="m-0">
                                            الأطلاع على الدورة </span></label></div>
                                <div class="col-4"><label><input checked type="checkbox"> تحرير الإعدادات <span>
                                        </span></label></div>
                                <div class="col-4"><label><input type="checkbox"> <span> الأطلاع على النتائج
                                        </span></label></div>
                                <div class="col-4"><label><input type="checkbox"> <span> تحرير برنامج </span></label>
                                </div>
                                <div class="col-4"><label><input type="checkbox"> <span> تحرير برنامج </span></label>
                                </div>
                                <div class="col-4"><label><input type="checkbox"> <span> تحرير برنامج </span></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3 border-bottom-1 pb-2">
                            <h6> العملاء </h6>
                            <div class="row">
                                <div class="col-4"><label><input type="checkbox"> <span> تحرير الاعدادات
                                        </span></label></div>
                                <div class="col-4"><label><input checked="" type="checkbox"> <span> اضافة اعضاء
                                        </span></label></div>
                                <div class="col-4"><label><input type="checkbox"> <span> اضافة برنامج </span></label>
                                </div>
                                <div class="col-4"><label><input type="checkbox"> <span> تحرير برنامج </span></label>
                                </div>
                                <div class="col-4"><label><input checked="" type="checkbox"> <span> حذف اعضاء
                                        </span></label></div>
                                <div class="col-4"><label><input type="checkbox"> <span> خيارات اخري </span></label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" type="submit"> حفظ <i
                            class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
