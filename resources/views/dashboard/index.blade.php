@extends('dashboard.layouts.master')
@section('header')
    <div>
        <p class="mg-b-0">مرحبا بك مجددا</p>
        <h4 class="main-content-title tx-18 mg-b-1 mg-b-lg-1">{{Auth::user()->name}}</h4>

    </div>
@endsection
@section('content')
    <div class="main-content app-content">
        <!-- main-header opened -->
        <div class="main-header sticky side-header nav nav-item">
            <div class="container-fluid">
                <div class="main-header-left ">
                    <div class="responsive-logo">
                        <a href="index.html"><img src="assets/img/brand/logo.png" class="logo-1" alt="logo"></a>
                        <a href="index.html"><img src="assets/img/brand/logo-white.png" class="dark-logo-1"
                                alt="logo"></a>
                        <a href="index.html"><img src="assets/img/brand/favicon.png" class="logo-2" alt="logo"></a>
                        <a href="index.html"><img src="assets/img/brand/favicon.png" class="dark-logo-2" alt="logo"></a>
                    </div>
                    <div class="app-sidebar__toggle" data-toggle="sidebar">
                        <a class="open-toggle" href="#"><i class="header-icon si si-menu"></i></a>
                        <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
                    </div>
                    <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                        <input class="form-control" placeholder="بحث ..." type="search"> <button class="btn"><i
                                class="fas fa-search d-none d-md-block"></i></button>
                    </div>
                </div>
                <div class="main-header-right">
                    <div class="nav nav-item  navbar-nav-right ml-auto">
                        <div class="nav-link" id="bs-example-navbar-collapse-1">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="reset" class="btn btn-default">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="submit" class="btn btn-default nav-link resp-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>



                        <div class="dropdown nav-item main-header-message ">
                            <a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg><span class=" pulse-danger"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-right">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages</h6>
                                        <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All
                                            Read</span>
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4
                                        unread messages</p>
                                </div>
                                <div class="main-message-list chat-scroll">
                                    <a href="#" class="p-3 d-flex border-bottom">
                                        <div class="  drop-img  cover-image  " data-image-src="assets/img/faces/3.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">Petey Cruiser</h5>
                                            </div>
                                            <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......
                                            </p>
                                            <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-image-src="assets/img/faces/2.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">Jimmy Changa</h5>
                                            </div>
                                            <p class="mb-0 desc">All set ! Now, time to get to you now......</p>
                                            <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 06 01:12 AM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-image-src="assets/img/faces/9.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">Graham Cracker</h5>
                                            </div>
                                            <p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
                                            <p class="time mb-0 text-left float-right mr-2 mt-2">Feb 25 10:35 AM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-image-src="assets/img/faces/12.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">Donatella Nobatti</h5>
                                            </div>
                                            <p class="mb-0 desc">Here are some products ...</p>
                                            <p class="time mb-0 text-left float-right mr-2 mt-2">Feb 12 05:12 PM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="p-3 d-flex border-bottom">
                                        <div class="drop-img cover-image" data-image-src="assets/img/faces/5.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">Anne Fibbiyon</h5>
                                            </div>
                                            <p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
                                            <p class="time mb-0 text-left float-right mr-2 mt-2">Jan 29 03:16 PM</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="text-center dropdown-footer">
                                    <a href="text-center">VIEW ALL</a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown nav-item main-header-notification">
                            <a class="new nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bell">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg><span class=" pulse"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-right">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications
                                        </h6>
                                        <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All
                                            Read</span>
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4
                                        unread Notifications</p>
                                </div>
                                <div class="main-notification-list Notification-scroll">
                                    <a class="d-flex p-3 border-bottom" href="#">
                                        <div class="notifyimg bg-pink">
                                            <i class="la la-file-alt text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">New files available</h5>
                                            <div class="notification-subtext">10 hour ago</div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3" href="#">
                                        <div class="notifyimg bg-purple">
                                            <i class="la la-gem text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">Updates Available</h5>
                                            <div class="notification-subtext">2 days ago</div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="#">
                                        <div class="notifyimg bg-success">
                                            <i class="la la-shopping-basket text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">New Order Received</h5>
                                            <div class="notification-subtext">1 hour ago</div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="#">
                                        <div class="notifyimg bg-warning">
                                            <i class="la la-envelope-open text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">New review received</h5>
                                            <div class="notification-subtext">1 day ago</div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="#">
                                        <div class="notifyimg bg-danger">
                                            <i class="la la-user-check text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">22 verified registrations</h5>
                                            <div class="notification-subtext">2 hour ago</div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="#">
                                        <div class="notifyimg bg-primary">
                                            <i class="la la-check-circle text-white"></i>
                                        </div>
                                        <div class="mr-3">
                                            <h5 class="notification-label mb-1">Project has been approved</h5>
                                            <div class="notification-subtext">4 hour ago</div>
                                        </div>
                                        <div class="mr-auto">
                                            <i class="las la-angle-left text-left text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="">VIEW ALL</a>
                                </div>
                            </div>
                        </div>


                        <div class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="#"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-maximize">
                                    <path
                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                    </path>
                                </svg></a>
                        </div>

                        <div class="dropdown nav-item main-header-message ">
                            <a class="new nav-link" href="#">
                                <i class="la la-cog"></i>
                            </a>
                        </div>

                        <div class="dropdown main-profile-menu nav nav-item nav-link">
                            <a class="profile-user d-flex" href=""><img alt=""
                                    src="assets/img/faces/1.jpg"></a>
                            <div class="dropdown-menu">
                                <div class="main-header-profile bg-primary p-3">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user"><img alt="" src="assets/img/faces/1.jpg"
                                                class=""></div>
                                        <div class="mr-3 my-auto">
                                            <h6>Petey Cruiser</h6><span>Premium Member</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
                                <a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
                                <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
                                <a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
                                <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account
                                    Settings</a>
                                <a class="dropdown-item" href="page-signin.html"><i class="bx bx-log-out"></i> Sign
                                    Out</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- breadcrumb -->
            <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0"
                style="border-top: 1px solid #00000030;">
                <div class="left-content">
                    <div>
                        <p class="mg-b-0">مرحبا بك مجددا</p>
                        <h4 class="main-content-title tx-18 mg-b-1 mg-b-lg-1">سلمي أحمد علي</h4>

                    </div>
                </div>
                <div class="main-dashboard-header-right">
                    <div class=" d-flex">
                        <a href="Program_management/create_programme.html"
                            class="btn btn-warning-gradient btn-with-icon mr-1"> انشاء برنامج <i
                                class="bi bi-plus"></i></a>
                        <button class="btn btn-warning-gradient btn-with-icon mr-1"data-target="#modaladd"
                            data-toggle="modal"> اضافة مشاركين <i class="bi bi-plus"></i></button>
                        <button class="btn btn-warning-gradient btn-icon mr-1"><i
                                class="si si-options-vertical"></i></button>
                    </div>
                </div>
            </div>
            <!-- /breadcrumb -->
        </div>
        <!-- /main-header -->


        <br><br><br><br><br>
        <!-- container opened -->
        <div class="container-fluid mt-3">
            <!-- row -->
            <div class="row row-sm sales-cardSmall">
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body  iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-book text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد البرامج الكلي</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">20</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-book text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد البرامج القائمة</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">13</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="si si-layers text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد الدورات الكلي</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">75</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="si si-layers text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عدد الدورات القائمة</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">500</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-part">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-group-outline text-warning tx-24"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted">عددالمسجلين</p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">500</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->

            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-xl-7 col-sm-12 ">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="main-content-label mg-b-2 LineChart">
                                    معدل الحضور على مدار الوقت
                                </div>
                                <i class="si si-options-vertical text-gray"></i>

                            </div>
                            <div class="chartjs-wrapper-demo">
                                <div class="chartjs-size-monitor"
                                    style="position: absolute;direction: rtl; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="chartLine1" class="chartjs-render-monitor" style="direction: rtl;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-sm-12 " style="height: 100% !important;">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="main-content-label mg-b-2">
                                    نسبة الدورات المكتملة
                                </div>
                                <i class="si si-options-vertical text-gray"></i>

                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart" class=""></div>
                            <div class="row">
                                <div class="col-md-12 col text-center">
                                    <h3 class="">الدورات المكتملة</h3>
                                    <span class="fs-14 text-muted">
                                        50% من الدورات مكتملة
                                    </span>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- row closed -->

            <!-- row opened -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="panel panel-primary tabs-style-3 bg-white card card-dashboard-eight pb-2">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu ">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab11" class="active d-flex" data-toggle="tab"><i
                                                class="text-center text-purple cartTap  bg-purple-transparent  brround">10</i>البرامج
                                            القائمة</a></li>
                                    <li><a href="#tab12" data-toggle="tab" class="d-flex"><i
                                                class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i>الدورات
                                            القائمة</a></li>
                                    <li><a href="#tab13" data-toggle="tab" class="d-flex"><i
                                                class="text-center text-purple cartTap  bg-purple-transparent  brround">05</i>اخر
                                            الدعوات</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab11">
                                    <div class="table-responsive">
                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr class="list-unstyled">
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
                                                    <th>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-check-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                        </svg>
                                                        الحالة
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">برنامج التدريب الأساسي.</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td><span class="tag tag-rounded bg-success-transparent text-success">
                                                            فعال </span></td>
                                                    <td><i class="mdi mdi-dots-horizontal text-gray"></i></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">برنامج التدريب الأساسي.</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td><span
                                                            class="tag tag-rounded bg-warning-transparent text-warning">تحت
                                                            المراجعة</span>
                                                    <td><i class="mdi mdi-dots-horizontal text-gray"></i></td>

                                                </tr>
                                                <tr>
                                                    <td scope="row">برنامج التدريب الأساسي.</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">في
                                                            المعالجة</span>
                                                    </td>
                                                    <td><i class="mdi mdi-dots-horizontal text-gray"></i></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">برنامج التدريب الأساسي.</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td><span class="tag tag-rounded bg-primary-transparent text-primary">
                                                            في المعالجة </span>
                                                    <td><i class="mdi mdi-dots-horizontal text-gray"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab12">
                                    <div class="table-responsive">
                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr class="list-unstyled">
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
                                                    <th>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-check-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                        </svg>
                                                        الحالة
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">الدورات القائمة</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-success">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">الدورات القائمة</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-warning-transparent text-warning">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">الدورات القائمة</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">الدورات القائمة</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab13">
                                    <div class="table-responsive">
                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                            <thead>
                                                <tr class="list-unstyled">
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
                                                    <th>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-check-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                        </svg>
                                                        الحالة
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-success">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-warning-transparent text-warning">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">اخر الدعوات</td>
                                                    <td>3</td>
                                                    <td>على حسن على</td>
                                                    <td>12/06/2023</td>
                                                    <td>12/06/2023</td>
                                                    <td>
                                                        <span
                                                            class="tag tag-rounded bg-primary-transparent text-primary">Third
                                                            tag</span>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
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


            </div>
            <!-- row close -->

            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature2">

                                <i
                                    class="icon ion-ios-rocket ht-50 wd-50 text-center brround card-chart text-purple  bg-purple-transparent  brround"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-2 tx-16">برنامج التسويق الرقمي</h5>
                                <li class="mdi mdi-dots-vertical"></li>
                            </div>
                            <hr>
                            <span class="fs-14 text-muted">
                                برنامج التسويق الرقمي هو أكثر البرامج نشاطا حاليا خلال تطبيقنا
                                الأدراة تسجيل حضور الدورات الرقمية
                            </span>
                            <hr>
                            <div class="demo-avatar-group">

                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle  mr-2" src="assets/img/faces/5.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/3.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/4.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/5.jpg">
                                </div>


                                <div class="mr-3">
                                    <span class="badge badge-success">+</span>
                                    <span class="label mr-1">دعوة</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature2">

                                <i
                                    class="fe fe-award ht-50 wd-50 text-center card-chart text-purple bg-purple-transparent brround"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-2 tx-16">برنامج الابتكار وريادة الأعمال</h5>
                                <li class="mdi mdi-dots-vertical"></li>
                            </div>
                            <hr>
                            <span class="fs-14 text-muted">
                                برنامج التسويق الرقمي هو أكثر البرامج نشاطا حاليا خلال تطبيقنا
                                الادراة تسجيل حضور الدورات الرقمية
                            </span>
                            <hr>
                            <div class="demo-avatar-group">

                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle  mr-2" src="assets/img/faces/5.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/3.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/4.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/5.jpg">
                                </div>


                                <div class="mr-3">
                                    <span class="badge badge-success">+</span>
                                    <span class="label mr-1">دعوة</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature2">

                                <i
                                    class="cf cf-xrp ht-50 wd-50 text-center brround text-purple bg-purple-transparent card-chart"></i>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-2 tx-16">برنامج تطوير المهارات الشخصية</h5>
                                <li class="mdi mdi-dots-vertical"></li>
                            </div>
                            <hr>
                            <span class="fs-14 text-muted">
                                برنامج التسويق الرقمي هو أكثر البرامج نشاطا حاليا خلال تطبيقنا
                                الادراة تسجيل حصور الدورات الرقمية.
                            </span>
                            <hr>
                            <div class="demo-avatar-group">

                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle  mr-2" src="assets/img/faces/5.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/3.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/4.jpg">
                                </div>
                                <div class="main-img-user avatar-sm">
                                    <img alt="avatar" class="rounded-circle" src="assets/img/faces/5.jpg">
                                </div>


                                <div class="mr-3">
                                    <span class="badge badge-success">+</span>
                                    <span class="label mr-1">دعوة</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- container closed -->
    </div>
@endsection
