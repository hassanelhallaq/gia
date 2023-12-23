<!--start main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ URL::asset('assets/img/brand/favicon.png')  }}" class="logo-icon" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="d-block pos-relative">
            <ul class="side-menu pos-absolutee top-0 start-0">
                <li class="slide  ">
                    <a class="side-menu__item bg-warning-gradient m-3 ml- p-1  rounded text-white tx-24 h-100"   href="{{route('admin.dashboard')}}" style="width: 80%; border: 1px;">
                        <i class="icon ion-ios-home ml-4"></i>
                        <span class="side-menu__label text-white tx-18"> الرئيسية </span><i class=""></i>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="typcn typcn-folder tx-22"></i><span class="side-menu__label mr-3">ادارة البرامج</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu  ">
                        <li class=""><a class="slide-item" href="{{route('categories.index')}}"> الفئات </a></li>
                        <li class=""><a class="slide-item" href="{{route('programs.index')}}"> البرامج </a></li>
                        <li class=""><a class="slide-item" href="{{route('courses.index')}}"> الدورات التدريبية </a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="{{route('quizes.index')}}"><i class="far fa-file-alt tx-22"></i><span class="side-menu__label mr-3">الأسئلة والاستبيانات</span><i class=""></i></a>

                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="si si-people tx-22"></i><span class="side-menu__label mr-3">اصحاب المصلحة</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{route('admins.index')}}">الادارة </a></li>
                        <li><a class="slide-item" href="{{route('clients.index')}}">العملاء</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item"   href="{{route('attendance.index')}}"><i class="typcn typcn-group-outline tx-22"></i><span class="side-menu__label mr-3">ادارة المشتركين</span><i class=""></i></a>

                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="mdi mdi-account-card-details tx-22"></i><span class="side-menu__label mr-3">الدعوات الإلكترونية</span><i class=""></i></a>

                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="icon ion-ios-stats tx-22"></i><span class="side-menu__label mr-3">التقارير</span><i class=""></i></a>

                </li>

                <li class="slide ">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="la la-cog tx-22"></i><span class="side-menu__label mr-3">الإعدادات</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="bx bx-log-out tx-22"></i><span class="side-menu__label mr-3">تسجيل الخروج</span></a>
                </li>

            </ul>
        </div>

    </div>
</aside>
<!--end main-sidebar -->
