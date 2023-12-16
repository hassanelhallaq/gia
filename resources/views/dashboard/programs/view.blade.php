@extends('dashboard.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <style>
        .circle {
          width: 10px;
          height: 10px;
          border-radius: 50%;
          background-color: red; /* يمكنك تغيير لون النقطة هنا */
        }
        .form{

        position: relative;
        }
        .form .fa-search {
            position: absolute;
            top: 14px;
            /* left: 20px; */
            margin-right: 9px;
            color: #9ca3af;
        }
        .form span {
            position: absolute;
            /* right: 17px; */
            left: 0;
            top: 8px;
            padding-left: 9px !important;
            padding: 2px;
            /* border-left: 1px solid #d1d5db; */
        }

        .left-pan{
        padding-right: 7px;
        }

        .left-pan i{

        padding-left: 10px;
        }

        .form-input{
        background-color: #fdfbfb;
        height: 40px;
        text-indent: 33px;
        border-radius: 10px;
        }

        .select2-no-search{
            border-radius: 0px !important;
            border: 0px !important;
        }



        .form-input:focus{


        }
        </style>
@endsection
@section('content')
<div class="container-fluid mt-3">
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex p-3">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input" placeholder="بحث">
                            <span class="right-pan"><i class="bi bi-sliders"></i></span>
                        </div>
                        <div class="d-flex">
                            <p class="mt-2 mr-2 d-flex"> عرض: </p>

                        <select class="form-control select2-no-search mr-0">
                            <option value="Firefox">
                                الكل
                            </option>
                            <option value="Chrome">
                                10
                            </option>
                            <option value="Safari">
                                50
                            </option>
                            <option value="Opera">
                                100
                            </option>
                        </select>
                        </div>
                        <div class="mr-auto d-block tx-20">
                            <a href=""><i class="typcn typcn-calendar-outline"></i></a>
                            <a href=""><i class="bi bi-grid  bg-black-9 text-white pr-1 pl-1"></i></a>
                            <a href=""><i class="bi bi-list"></i></a>

                        </div>
                    </div>
                </div>


        </div>
    </div>
    <!-- clos row -->

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body">
                <div class="row">
                    <!-- col  -->
                    @foreach ($programs as $item)


                    <div class="col-sm-12 col-xl-4 col-lg-4">
                        <div class="carts shadow">
                            <div class="widget-user-header p-2">

                                <div class="todo-widget-header d-flex justify-content-between">
                                        <p class="mb-2 tx-14 tx-black text-muted"> {{$item->name}}</p>
                                        <div class="">
                                            <a class="p-2 text-muted" data-toggle="dropdown"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu tx-13 dropleft">
                                                <a class="dropdown-item" href="#">Mark As Unread</a>
                                                <a class="dropdown-item" href="#">Mark As Important</a>
                                            </div>
                                        </div>
                                </div>
                                <p class="mb-3 tx-13 text-muted">  {{$item->content_two}}</p>
                                <div class="d-flex justify-content-end ">
                                    <span class="tag tag-rounded bg-success-transparent text-success pr-3"><div class="dot-label bg-success"></div> مستمر </span>
                                </div>


                                <div class="progress progress-style ht-3 mb-4 mt-3">
                                    <div class="progress-bar bg-success wd-50p" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>0%</p>
                                    <p>25%</p>
                                    <p>50%</p>
                                    <p>75%</p>
                                    <p>100%</p>
                                </div>
                            </div>
                            <div class="user-wideget-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <span class="description-text">عدد الدورات</span>
                                            <h5 class="description-header">{{$item->courses_count}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <span class="description-text">بداء في</span>

                                            <h5 class="description-header">{{$item->start}}</h5>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <span class="description-text">ينتهي من</span>
                                            <h5 class="description-header">{{$item->end}}</h5>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-between mt-4">
                                    <p><i class="mdi mdi-account-outline tx-15"></i><span class="tx-11"> اسم العميل :  {{$item->client_name}}</span></p>
                                    <div class="wrapper d-flex image-group pb-3">
                                        <img src="../assets/img/faces/1.jpg" alt="profile" class="img-xs rounded-circle">
                                        <img src="../assets/img/faces/2.jpg" alt="profile" class="img-xs rounded-circle">
                                        <img src="../assets/img/faces/2.jpg" alt="profile" class="img-xs rounded-circle">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <!-- col closed -->
                    <!-- col one  -->
                    <div class="col-12">
                        <div class="card mg-b-20 mt-3">
                            <div class="card-body d-flex p-3">
                                <ul class="pagination mb-0">
                                    {!! $programs->links() !!}
                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- clos row -->
            </div>
            <!--clos cart-->
        </div>
    </div>
    <!-- clos row -->


</div>
<!-- container closed -->
</div>
@endsection
