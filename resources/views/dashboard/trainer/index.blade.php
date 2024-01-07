@extends('dashboard.layouts.master')
@section('header')
 <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
    <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="" > الرئيسية</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted"> اصحاب المصلحة  </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted"> المدربين </a>
                </li>

            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">
        <div class=" d-flex">
            <button class="btn btn-warning-gradient btn-with-icon ml-1"data-target="#modalAddRoles" data-toggle="modal"> اضافة صلاحية جديدة  <i class="bi bi-plus"></i></button>
            <button class="btn btn-warning-gradient btn-with-icon"data-target="#modaladd" data-toggle="modal"> اضافة مدرب جديد <i class="bi bi-plus"></i></button>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">

    <!--open filter Top  -->
     <div class="col-lg-12">
         <div class="card mg-b-20">
             <div class="card-body d-flex p-3">
                 <div class="form">
                     <i class="fa fa-search"></i>
                     <input type="text" class="form-control form-input" id="search-table"
                         placeholder="بحث">
                     <span class="right-pan"><i class="bi bi-sliders"></i></span>
                 </div>

                 {{-- <div class="d-flex">
                     <p class="mt-2 mr-2 d-flex"> عرض: </p>
                     <select class="form-control select2-no-search mr-0 table-rows-number">
                         <option value="all">
                             الكل
                         </option>
                         <option value="1">
                             1
                         </option>
                         <option value="2">
                             2
                         </option>
                         <option value="3">
                             3
                         </option>
                         <option value="10" selected>
                             10
                         </option>
                         <option value="50">
                             50
                         </option>
                         <option value="100">
                             100
                         </option>
                     </select>
                 </div> --}}

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
                                <th>  عدد الدورات </th>
                                <th> الحالة </th>
                                <!-- Filter -->
                                <td class="col-filter">
                                    <!-- dropdown-menu -->
                                    <button data-toggle="dropdown" class="btn btn-previous p-0"><i class="bi bi-filter-square tx-20"></i></button>
                                    <div class="dropdown-menu scrollable-menu" role="menu">
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <tr>
                                <p class="p-5 text-center d-none" id="empty-message">لا توجد
                                    بيانات لعرضها</p>
                            </tr>
                            @foreach ($trainers as $i => $item)


                            <tr class="table-rows">
                                <td><input type="checkbox" class="checkChild"></td>
                                <td>{{$i + 1}}</td>
                                <td scope="row"> {{$item->name}} </td>
                                <td> {{$item->phone}} </td>
                                <td> {{$item->email}} </td>
                                <td> 10 </td>
                                <td> <span class="tag tag-rounded bg-success-transparent text-success"> فعال   </span></td>
                                <td class="d-flex filter-col-cell">
                                    <!-- dropdown-menu -->
                                    <button data-toggle="dropdown" class="btn btn-previous btn-sm"><i class="si si-options-vertical text-gray tx-12"></i></button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item" data-target="#modaledit_{{$item->id}}" data-toggle="modal"> تحرير </a>
                                        <button  class="dropdown-item"data-target="#modalDelete" onclick="performDestroy({{ $item->id }} , this)" > حذف </button>
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
     <!-- table -->

     <!--open filter bottom  -->
     <div class="col-12">
         <div class="card mg-b-20">
             <div class="card-body d-flex p-3">
                 <ul class="pagination mb-0">
                    {!! $trainers->links() !!}

                 </ul>

             </div>
         </div>
     </div>
     <!--closed filter bottom  -->
</div>
<div class="modal" id="modaladd">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title"> اضافة مدرب </h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col-12 mt-4">
                            <label for="example"> الأسم  </label>
                            <input class="form-control"  required="" id="name"  type="text">
                        </div>
                        <div class="col-12 mt-4">
                            <label for="example">  رقم الهاتف </label>
                            <input class="form-control"  required=""  id="phone" type="text">
                        </div>
                        <div class="col-12 mt-4">
                            <label for="example"> البريد الألكتروني </label>
                            <input class="form-control"  required="" id="email" type="email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" onclick="performStore()" type="button"> حفظ <i class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($trainers as $item)

<div class="modal" id="modaledit_{{$item->id}}">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title"> تحرير مدرب </h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col-12 mt-4">
                            <label for="example"> الأسم  </label>
                            <input class="form-control" value="{{$item->name}}" id="name_{{$item->id}}" required="" type="text">
                        </div>
                        <div class="col-12 mt-4">
                            <label for="example">  رقم الهاتف </label>
                            <input class="form-control" value="{{$item->phone}}" id="phone_{{$item->id}}" required="" type="text">
                        </div>
                        <div class="col-12 mt-4">
                            <label for="example"> البريد الألكتروني </label>
                            <input class="form-control" value="{{$item->email}}" id="email_{{$item->id}}" required="" type="email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" onclick="performUpdate({{$item->id}})" type="button"> حفظ <i class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
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
                                <div class="col-4"><label ><input  type="checkbox"> <span> تحرير الاعدادات </span></label></div>
                                <div class="col-4"><label ><input checked=""  type="checkbox"> <span> اضافة اعضاء </span></label></div>
                                <div class="col-4"><label ><input  type="checkbox"> <span> اضافة برنامج </span></label></div>
                                <div class="col-4"><label ><input  checked type="checkbox"> <span> تحرير برنامج </span></label></div>
                                <div class="col-4"><label ><input  checked type="checkbox"> <span> حذف اعضاء </span></label></div>
                                <div class="col-4"><label ><input   type="checkbox"> <span> خيارات اخري </span></label></div>
                            </div>
                        </div>

                        <div class="col-12 mb-3 border-bottom-1 pb-2">
                            <h6> المدربين </h6>
                            <div class="row">
                                <div class="col-4"><label ><input checked type="checkbox"> <span class="m-0"> الأطلاع على الدورة </span></label></div>
                                <div class="col-4"><label ><input checked type="checkbox"> تحرير الإعدادات <span>  </span></label></div>
                                <div class="col-4"><label ><input  type="checkbox"> <span> الأطلاع على النتائج </span></label></div>
                                <div class="col-4"><label ><input  type="checkbox"> <span> تحرير برنامج </span></label></div>
                                <div class="col-4"><label ><input  type="checkbox"> <span> تحرير برنامج </span></label></div>
                                <div class="col-4"><label ><input  type="checkbox"> <span> تحرير برنامج </span></label></div>
                            </div>
                        </div>

                        <div class="col-12 mb-3 border-bottom-1 pb-2">
                            <h6> العملاء </h6>
                            <div class="row">
                                <div class="col-4"><label><input  type="checkbox"> <span> تحرير الاعدادات </span></label></div>
                                <div class="col-4"><label><input checked=""  type="checkbox"> <span> اضافة اعضاء </span></label></div>
                                <div class="col-4"><label><input  type="checkbox"> <span> اضافة برنامج </span></label></div>
                                <div class="col-4"><label><input  type="checkbox"> <span> تحرير برنامج </span></label></div>
                                <div class="col-4"><label><input checked=""  type="checkbox"> <span> حذف اعضاء </span></label></div>
                                <div class="col-4"><label><input   type="checkbox"> <span> خيارات اخري </span></label></div>
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
@section('js')
    <script src="{{ asset('assets/js/RepeatTest.js') }}"></script>
    <script>
        function performStore() {
            let data = {
                name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
            };
            storepart('/dashboard/admin/trainers', data);
        }

        function performUpdate(id) {
        let formData = new FormData();
        formData.append("_method", "PUT")
        formData.append('name', document.getElementById('name_'+id).value);
        formData.append('email', document.getElementById('email_'+id).value);
        formData.append('phone', document.getElementById('phone_'+id).value);

        storepart('/dashboard/admin/trainers/'+id, formData)
}
    </script>

<script>
    function performDestroy(id, reference) {

        let url = '/dashboard/admin/trainers/' + id;

        confirmDestroy(url, reference);
    }
</script>

@endsection
