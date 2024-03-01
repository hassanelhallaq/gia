<!--start main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{route('admin.dashboard')}}"><img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{route('admin.dashboard')}}"><img src="{{ URL::asset('assets/img/brand/favicon.png')  }}" class="logo-icon" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="h-100 flex-column  d-inline-flex justify-content-between">
            <ul class="side-menu pos-absolutee top-0 start-0">
                <li class="slide">
                    @if(Auth::guard('admin')->check())

                    <a class="side-menu__item" href="{{route('admin.dashboard')}}"><i class="icon ion-ios-home tx-22"></i><span class="side-menu__label mr-3"> الرئيسية </span><i class=""></i></a>
                    @elseif (Auth::guard('client')->check())
                    <a class="side-menu__item" href="{{route('client.dashboard')}}"><i class="icon ion-ios-home tx-22"></i><span class="side-menu__label mr-3"> الرئيسية </span><i class=""></i></a>

                    @endif
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="typcn typcn-folder tx-22"></i><span class="side-menu__label mr-3">ادارة البرامج</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu  ">
                        @can('الأطلاع على البرامج')


                        <li class=""><a class="slide-item" href="{{route('programs.index')}}"> البرامج </a></li>
                        @endcan
                        @if(Auth::guard('admin')->check())

                        {{-- <li class=""><a class="slide-item" href="{{route('categories.index')}}"> الفئات </a></li> --}}
                        @endif
                        @can('الأطلاع على الدورة')

                        <li class=""><a class="slide-item" href="{{route('courses.index')}}"> الدورات التدريبية </a></li>
                        @endcan

                    </ul>
                </li>
                @if(!Auth::guard('trainer')->check())
                <li class="slide">
                    @can('الأطلاع على الاسئله والاستبيان')

                    <a class="side-menu__item"  href="{{route('quizes.index')}}"><i class="far fa-file-alt tx-22"></i><span class="side-menu__label mr-3">الأسئلة والاستبيانات</span><i class=""></i></a>
                    @endcan

                </li>
                @endif
                @if(Auth::guard('admin')->check())

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide"  href="#"><i class="si si-people tx-22"></i><span class="side-menu__label mr-3">اصحاب المصلحة</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('الأطلاع على الاداره')
                        <li><a class="slide-item" href="{{route('admins.index')}}">الادارة </a></li>
                        @endcan
                        @can('الأطلاع على العملاء')

                        <li><a class="slide-item" href="{{route('clients.index')}}">العملاء</a></li>
                        @endcan
                        @can('الأطلاع على المدربين')

                        <li><a class="slide-item" href="{{route('trainers.index')}}">المدربين</a></li>
                        @endcan
                        @can('الأطلاع على المشاركين')

                        <li><a class="slide-item" href="{{route('attendance.index')}}">المشاركين</a></li>
                        @endcan

                    </ul>
                </li>

                @can('الأطلاع على المشاركين')

                <li class="slide">
                    <a class="side-menu__item" href="{{route('attendance.index')}}"><i class="typcn typcn-group-outline tx-22"></i><span class="side-menu__label mr-3">ادارة المشتركين</span><i class=""></i></a>

                </li>
                @endcan
                @can('اضافه مدير مشروع')

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide"  href="#"><i class="si si-people tx-22"></i><span class="side-menu__label mr-3"> اضافة مدير مشروع </span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('AddProjectManager') }}"> اضافة </a></li>
                    </ul>
                </li>

                @endcan

                @can('اضافه مشروع')

                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide"  href="#"><i class="si si-people tx-22"></i><span class="side-menu__label mr-3"> اضافة مشروع </span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('AddProject') }}"> اضافة </a></li>
                    </ul>
                </li>
                @endcan



                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="mdi mdi-account-card-details tx-22"></i><span class="side-menu__label mr-3">الدعوات الإلكترونية</span><i class=""></i></a>

                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#"><i class="icon ion-ios-stats tx-22"></i><span class="side-menu__label mr-3">التقارير</span><i class=""></i></a>
                </li>
            </ul>
            @endif


            <ul class="side-menu pb-2">
                @if(Auth::guard('admin')->check())

                <li class="slide">
                    <a class="side-menu__item " data-toggle="slide" href="#"><i class="la la-cog tx-22"></i><span class="side-menu__label mr-3"> الإعدادات </span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('الاطلاع على الصلاحيات')

                        <li><a class="slide-item" href="{{route('roles.index')}}"> الصلاحيات</a></li>
                        @endcan

                        <li><a class="slide-item" href="settings/main_page_settings.html"> اعدادات الشاشة الرئيسية </a></li>
                        <li><a class="slide-item" href="settings/programmes_settings.html"> اعدادات البرامج </a></li>
                        <li><a class="slide-item" href="settings/courses_settings.html"> اعدادات الدورة </a></li>
                        <li><a class="slide-item" href="Stakeholde_management/customers.html"> اعدادات المستخدمين </a></li>
                        <li><a class="slide-item" href="Stakeholde_management/customers.html"> اعدادات الاختبارات  </a></li>
                    </ul>
                </li>
                @endif

                <li class="slide">
                    <a class="side-menu__item"  href="{{route('dashboard.auth.logout')}}"><i class="bx bx-log-out tx-22"></i><span class="side-menu__label mr-3">تسجيل الخروج</span></a>
                </li>
            </ul>
        </div>
    </div>
</aside>
<!--end main-sidebar -->
