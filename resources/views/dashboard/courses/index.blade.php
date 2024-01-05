@extends('dashboard.layouts.master')
@section('header')

{{-- <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0" style="border-top: 1px solid #00000030;"> --}}
    <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="../index.html" >الرئيسية</a>
                </li>
                {{-- <li class="breadcrumb-item">
                    <a href="table_program_management.html"class="text-muted">البرامج</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> {{$program->name}}</a>
                </li> --}}
            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right ">
        <div class=" d-flex flex-wrap">
            <button class="btn btn-outline-light btn-with-icon btn-sm mr-1 btn-export mb-1"> تصدير <i class="ti-stats-up project"></i></button>
            <button class="btn btn-outline-light btn-with-icon mr-1 mb-1"> اعدادات صفحة الويب  <i class="icon ion-ios-settings"></i></button>
            <button class="btn btn-outline-light btn-with-icon mr-1 mb-1"> اعدادات  <i class="icon ion-ios-settings"></i></button>
            @if($id)
            <a href="{{route('program.course.create',[$id])}}" class="btn btn-warning-gradient btn-with-icon mr-1 mb-1">   اضافة دورة جديدة  <i class="bi bi-plus"></i></a>
            @else
            <a href="{{route('courses.create')}}" class="btn btn-warning-gradient btn-with-icon mr-1 mb-1">   اضافة دورة جديدة  <i class="bi bi-plus"></i></a>

            @endif
            @if($program)
            <a href="{{route('home',[$program->username])}}" class="btn btn-warning-gradient btn-with-icon mr-1 mb-1">  عرض صفحة الويب <i class="icon ion-ios-share-alt"></i></a>
            @endif
        </div>
    </div>
{{-- </div> --}}
@endsection
@section('css')
<style>
    .scrollable-menu {
height: auto;
max-height: 100%;
overflow-x: hidden;
}
</style>
@endsection
@section('content')
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
                                        <th>
                                            اسم الدورة
                                        </th>
                                        <th>الفئة</th>
                                        <th> اسم المدرب</th>
                                        <th> المستوى </th>
                                        <th> تاريخ البداية </th>
                                        <th>المدة </th>
                                        <th>لغة الدورة</th>
                                        {{-- <th> عدد المسجلين </th>
                                        <th> اسم المنسق </th>
                                        <th>  شهادة  </th>
                                        <th> نسبة الشهادة </th>
                                        <th> المقاعد المتاحة </th>
                                        <th> الاختبار القبلي </th>
                                        <th> الاختبار البعدي </th>
                                        <th> تحميل المادة </th>
                                        <th> AS </th> --}}


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
                                        <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها</p>
                                    </tr>
                                    @foreach ($courses as $i => $item)
                                    <tr class="table-rows">
                                        <td><input type="checkbox" class="checkChild"></td>
                                        <td>1</td>
                                        <td scope="row">{{$item->name}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td class="client-name">  {{$item->trainer->name ?? ''}}</td>
                                        <td> مستوي اول </td>
                                        <td>{{$item->start}}</td>
                                        <td>{{$item->duration}}ايام</td>
                                          <td> @if($item->language == 'arabic')
                                            عربي
                                            @else
                                            انجليزيه
                                            @endif
                                        </td>
                                        {{-- <th> # </th>
                                        <th>{{$item->coordinator}} </th>
                                        <th>{{$item->is_certificate == 1 ? "نعم" : "لا"}}</th>
                                        <th> # </th>
                                        <th> # </th>
                                        <th> # </th>
                                        <th> # </th>
                                        <th> # </th>
                                        <th> # </th> --}}
                                        <td class="d-flex filter-col-cell">
                                            <a href="{{route('courses.show',[$item->id])}}"><i	class="far fa-eye text-gray tx-13 ml-4"></i></i></a>
                                            <!-- dropdown-menu -->
                                            <button data-toggle="dropdown"
                                                class="btn btn-previous btn-sm btn-block"><i
                                                    class="si si-options-vertical text-gray tx-12"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="{{route('courses.edit',[$item->id])}}" class="dropdown-item"> تحرير </a>
                                                <a href="" class="dropdown-item"data-target="#modalDelete" data-toggle="modal"> حذف </a>
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
                    {!! $courses->links() !!}

                 </ul>


             </div>
         </div>
     </div>
     <!--closed filter bottom  -->
 </div>
 <!-- row closed -->




@endsection
@section('js')
<script src="{{asset('assets/js/xlsx.full.min.js')}}"></script>
<script src="{{asset('assets/js/table.js')}}"></script>

@endsection
