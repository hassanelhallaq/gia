<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Title -->
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/x-icon" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=Tajawal:wght@400&display=swap"
        rel="stylesheet">

    <!-- Icons css -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

    <!--  Right-sidemenu css -->
    <!-- <link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet"> -->

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('assets/css-rtl/sidemenu.css')}}">
    <!--  Custom Scroll bar-->
    <link href="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!--- Style css-->
    <link href="{{asset('assets/css-rtl/style.css')}}" rel="stylesheet">
    <!-- <link href="assets/css-rtl/style-dark.css" rel="stylesheet"> -->

    <!---Skinmodes css-->
    <link href="{{asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet" />

    <!--- Animations css-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">

</head>
<div class="page">

    <!--start main-sidebar -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar sidebar-scroll">
        <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href=""><img src="{{asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
            <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
            <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
        </div>
        <div class="main-sidemenu">
            <div class="d-block pos-relative">
                <ul class="side-menu pos-absolutee top-0 start-0">
                    <li class="slide  ">
                        <button class="side-menu__item bg-warning-gradient m-3 ml- p-1  rounded text-white tx-24 h-100"
                            data-toggle="slide" href="#" style="width: 80%; border: 1px;">
                            <i class="icon ion-ios-home ml-4"></i>
                            <span class="side-menu__label text-white tx-18"> الرئيسية </span><i class=""></i>
                        </button>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="typcn typcn-folder tx-22"></i><span class="side-menu__label mr-3">ادارة
                                المشاريع</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu  ">
                            <li class=""><a class="slide-item"
                                    href="Program_management/table_program_management.html"> المشاريع </a></li>
                            <li class=""><a class="slide-item" href="Program_management/view_programmes.html">
                                    الدورات التدريبية </a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="far fa-file-alt tx-22"></i><span class="side-menu__label mr-3">الأسئلة
                                والاستبيانات</span><i class=""></i></a>

                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="si si-people tx-22"></i><span class="side-menu__label mr-3">اصحاب
                                المصلحة</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="#">الادارة </a></li>
                            <li><a class="slide-item" href="#">العملاء</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="typcn typcn-group-outline tx-22"></i><span class="side-menu__label mr-3">ادارة
                                المشتركين</span><i class=""></i></a>

                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="mdi mdi-account-card-details tx-22"></i><span
                                class="side-menu__label mr-3">الدعوات الإلكترونية</span><i class=""></i></a>

                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="icon ion-ios-stats tx-22"></i><span
                                class="side-menu__label mr-3">التقارير</span><i class=""></i></a>

                    </li>

                    <li class="slide ">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="la la-cog tx-22"></i><span class="side-menu__label mr-3">الإعدادات</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="bx bx-log-out tx-22"></i><span class="side-menu__label mr-3">تسجيل
                                الخروج</span></a>
                    </li>

                </ul>
            </div>

        </div>
    </aside>
    <div class="main-content app-content">

        <!-- main-header opened -->
        <div class="main-header sticky side-header nav nav-item">
            <div class="container-fluid">
                <div class="main-header-left ">
                    <div class="responsive-logo">
                        <a href="index.html"><img src="{{asset('assets/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
                        <a href="index.html"><img src="{{asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1"
                                alt="logo"></a>
                        <a href="index.html"><img src="{{asset('assets/img/brand/favicon.png')}}" class="logo-2"
                                alt="logo"></a>
                        <a href="index.html"><img src="{{asset('assets/img/brand/favicon.png')}}" class="dark-logo-2"
                                alt="logo"></a>
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
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                </line>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>



                        <div class="dropdown nav-item main-header-message ">
                            <a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg><span class=" pulse-danger"></span></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content bg-primary text-right">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages
                                        </h6>
                                        <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark
                                            All Read</span>
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4
                                        unread messages</p>
                                </div>
                                <div class="main-message-list chat-scroll">
                                    <a href="#" class="p-3 d-flex border-bottom">
                                        <div class="  drop-img  cover-image  "
                                            data-image-src="assets/img/faces/3.jpg">
                                            <span class="avatar-status bg-teal"></span>
                                        </div>
                                        <div class="wd-90p">
                                            <div class="d-flex">
                                                <h5 class="mb-1 name">Petey Cruiser</h5>
                                            </div>
                                            <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with
                                                that......</p>
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
                                        <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">
                                            Notifications</h6>
                                        <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark
                                            All Read</span>
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
                        <button class="btn btn-warning-gradient btn-with-icon mr-1"> + انشاء مشروع</button>
                        <button class="btn btn-warning-gradient btn-with-icon mr-1 "> + اضافة مشاركين </button>
                        <button class="btn btn-warning-gradient btn-icon mr-1"><i
                                class="si si-options-vertical"></i></button>
                    </div>
                </div>
            </div>
            <!-- /breadcrumb -->
        </div>
        @yield('content')
    </div>
    <div class="main-footer ht-40">
        <div class="container-fluid pd-t-0-f ht-100p">
            <span>Copyright © 2024 <a href="#">Mohammed</a>. Designed by <a href="#">Mohammed</a> All
                rights reserved.</span>
        </div>
    </div>
</div>
@yield('js')
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!--end Back-to-top -->
<!-- JQuery min js -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!--Internal  Chart.bundle js -->
<script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>

<!--Internal Sparkline js -->
<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Custom Scroll bar Js-->
<script src="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Rating js-->
<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<!-- P-scroll js -->
<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!-- Horizontalmenu js-->
<script src="{{asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{asset('assets/js/eva-icons.min.js')}}"></script>
<!-- Sticky js -->
<script src="{{asset('assets/js/sticky.js')}}"></script>
<script src="{{asset('assets/js/modal-popup.js')}}"></script>
<!-- Left-menu js-->
<script src="{{asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
<!--Internal  index js -->
<script src="{{asset('assets/js/index.js')}}"></script>
<!-- Apexchart js-->
<script src="{{asset('assets/js/apexcharts.js')}}"></script>
<!-- custom js -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/chart.chartjs.js')}}"></script>
</body>

</html>
