@extends('dashboard.layouts.master')
@section('content')
<div class="container-fluid mt-3">
    <!-- row -->
<div class="row row">

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


             </div>
         </div>
     </div>
     <!--closed filter Top  -->

     <!-- table -->
     <div class="col-lg-12">
         <div class="card">
             <div class="card-body">
                 <div class="tab-content">
                     <div class="tab-pane active" id="tab11">
                         <div class="table-responsive">
                             <table class="table table-striped mg-b-0 text-md-nowrap">
                                 <thead>
                                     <tr>
                                        <th>
                                            الأسم
                                        </th>
                                        <th>جهة العمل</th>
                                        <th> رقم الهاتف </th>
                                        <th> الرقم الوظيفي </th>
                                        <th> المهنة </th>
                                        <th> الاختبارات </th>
                                        <th> الاكتمال </th>
                                        <!-- Filter -->
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
                                 <tbody id="table-body">
                                    <tr>
                                        <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها</p>
                                    </tr>
                                    @foreach ($attendance as $item)
                                    <tr class="table-rows">
                                        <td scope="row"> {{$item->name}} </td>
                                        <td>{{$item->work_place}} </td>
                                        <td class="client-name"> {{$item->phone_number}} </td>
                                        <td>{{$item->id_number}} </td>
                                        <td>{{$item->job}} </td>
                                        <td class="d-flex">
                                            <span class="ml-3 examBefor">قبلي</span>
                                            <span class="examAfter">بعدي</span>
                                        </td>
                                        <td> 60% </td>
                                        <td><i class="mdi mdi-dots-horizontal text-gray tx-15"></i></td>
                                    </tr>
                                    @endforeach


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
                    {!! $attendance->links() !!}
                 </ul>



             </div>
         </div>
     </div>
     <!--closed filter bottom  -->
 </div>
 <!-- row closed -->



</div>

@endsection
