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

                 <div class="d-flex">
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
                 </div>

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
                 <div class="tab-content">
                     <div class="tab-pane active" id="tab11">
                         <div class="table-responsive">
                             <table class="table table-striped mg-b-0 text-md-nowrap">
                                 <thead>
                                     <tr>
                                        <th>
                                            اسم الدورة
                                        </th>
                                        <th>الفئة</th>
                                        <th>اسم المدرب</th>
                                        <th> المستوى </th>
                                        <th> تاريخ البداية </th>
                                        <th>المدة </th>
                                        <th>لغة الدورة</th>
                                        <!-- Filter -->
                                        <th>
                                            <div class="dropdown">
                                                <i aria-expanded="false" aria-haspopup="true" class="bi bi-filter-square-fill tx-"data-toggle="dropdown" id="dropdownMenuButton" type="button"></i></i>
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
                                    @foreach ($courses as $item)
                                    <tr class="table-rows">
                                        <td scope="row">{{$item->name}}</td>
                                        <td>{{$item->category_id}}</td>
                                        <td class="client-name">{{$item->coordinator}}</td>
                                        <td> مستوي اول </td>
                                        <td>{{$item->start}}</td>
                                        <td>{{$item->duration}}ايام</td>
                                        <td> {{$item->language}} </td>
                                        <td><i class="far fa-eye tx-15"></i></td>
                                        <td><i class="mdi mdi-dots-horizontal text-gray tx-15"></i></td>
                                        @endforeach
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
                     <li class="page-item"><button class="btn btn-previous" id="table-paganite-next"><i class="ti-angle-double-right"></i></button></li>
                     <li class="page-item m-2" id="table-pages">1/10</li>
                     <li class="page-item"><button class="btn btn-previous"  id="table-paganite-prev"><i class="ti-angle-double-left"></i></button>
                     </li>
                 </ul>
                 <div class="d-flex">
                     <div class="d-block mt-2"> عرض</div>
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
                 </div>
                 <div class="mr-auto tx-15 mt-2">
                     <span id="table-status">1-6 of 100</span>
                 </div>
             </div>
         </div>
     </div>
     <!--closed filter bottom  -->
 </div>
 <!-- row closed -->



</div>
@endsection
