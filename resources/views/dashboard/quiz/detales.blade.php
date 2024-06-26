@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="table_program_management.html"class="text-muted">اسم الدورة</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="table_program_management.html"class="text-muted"> اسم الاختبار </a>
                    </li>
                    {{-- <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> مشروع تطوير المهارات الشخصية </a>
                </li> --}}
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            <div class=" d-flex">
                <a href="{{route('quiz.view',[$id,'testQuiz'])}}" class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> عرض الاختبار </a>
                @if ($quiz->type != 'rate')
                <a class="btn btn-warning-gradient btn-with-icon btn-md mr-1"  href="{{route('quiz.questions',[$id])}}"> اضافة اسئلة <i class="bi bi-plus"></i></a>
                @else
                <a class="btn btn-warning-gradient btn-with-icon btn-md mr-1"  href="{{route('get.rate',[$id])}}"> اضافة اسئلة <i class="bi bi-plus"></i></a>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('content')
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



                <button class="btn btn-danger btn-sm btn-with-icon mr-1 text-white btnSelectDelete"data-target="#modalDelete" data-toggle="modal" style="display: none;">حذف الصفوف المختارة <i class="bi bi-trash tx-12"></i></button>

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
                                   السؤال
                               </th>
                               {{-- <th> نوع السؤال </th> --}}
                               <th> تاريخ الاضافة  </th>
                               <th> تاريخ التعديل </th>
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
                               <p class="p-5 text-center d-none" id="empty-message">لا توجد   بيانات لعرضها</p>
                           </tr>
                           @foreach ($questions as $i => $item)


                           <tr class="table-rows">
                               <td><input type="checkbox" class="checkChild"></td>
                               <td>{{$i +1}}</td>
                               <td scope="row"> {{$item->name}} </td>
                               {{-- <td>3</td> --}}
                               <td> {{$item->created_at}}</td>
                               <td> {{$item->updated_at}}</td>


                               <td class="d-flex filter-col-cell">
                                   <!-- dropdown-menu -->
                                   <button data-toggle="dropdown"class="btn btn-previous btn-sm">
                                    <i class="si si-options-vertical text-gray tx-12"></i></button>
                                   <div class="dropdown-menu">
                                       <a href="{{route('questions.edit',[$item->id])}}" class="dropdown-item"> تحرير </a>
                                       <button class="dropdown-item"
                                       onclick="performDestroy({{ $item->id }} , this)"> حذف
                                   </button>                                   </div>
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

                    </li>
                </ul>


            </div>
        </div>
    </div>
    <!--closed filter bottom  -->

@endsection
@section('js')

<script>
    function performDestroy(id, reference) {

        let url = '/dashboard/admin/questions/' + id;

        confirmDestroy(url, reference);
    }
</script>


@endsection
