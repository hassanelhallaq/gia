@extends('dashboard.layouts.master')
@section('header')
<div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
    <div class="left-content mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">


            </ol>
        </nav>
    </div>
    <div class="main-dashboard-header-right">

        <div class=" d-flex">

            <a class="btn btn-warning-gradient btn-with-icon mr-1" href="{{route('addMangement',[$type])}}">  انشاء  <i class="bi bi-plus"></i></a>

        </div>
    </div>
</div>
@endsection
<br><br>
<br>
<br>

@section('content')

        <!-- row -->
        <div class="row row">

            <!--open filter Top  -->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex p-3">
                        <form  method="get">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            {{-- <span class="right-pan"><i class="bi bi-sliders"></i></span> --}}
                            <div class="row row-sm mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group has-success mg-b-0">
                                        <input type="text" class="form-control form-input" name="name" value="{{request()->name}}" id="name" placeholder="بحث">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <button class="btn btn-outline-light " type="submit"> بحث </button>
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
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab11">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr class="tableHead">
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                 <th>
                                                     <i class="typcn typcn-folder"></i>
                                                     اسم البرنامج
                                                 </th>
                                                 <th>
                                                     <i class="si si-layers"></i>
                                                     عدد الدورات
                                                 </th>
                                                 <th>
                                                     <i class="mdi mdi-account-outline"></i>
                                                     العميل
                                                 </th>
                                                 <th><i class="far fa-calendar"></i> تاريخ البداية </th>
                                                 <th><i class="far fa-calendar"></i> تاريخ النهاية </th>

                                                 <th> الحالة </th>
                                                 <td class="col-filter">
                                                    <!-- dropdown-menu -->
                                                    <button data-toggle="dropdown"
                                                        class="btn btn-previous p-0"><i
                                                            class="bi bi-filter-square tx-20"></i></button>
                                                    <div class="dropdown-menu">
                                                    </div>
                                                </td>
                                            </tr>
                                         </thead>
                                         @foreach ($admins as $admin)
                                         <tbody id="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات
                                                        لعرضها
                                                    </p>
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

                        {{-- <div class="mr-auto tx-15 mt-2">
                            <span id="table-status">1-6 of 100</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--closed filter bottom  -->
        </div>
        <!-- row closed -->




@endsection
@section('js')


@endsection
