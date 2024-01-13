<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="{{asset('site/style.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700&family=Montserrat:wght@500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    @php
      $course =  App\Models\Course::find(request()->course_id);
    @endphp
    <title>{{ $course->name}}</title>
  </head>
  <body>
    <!-- header -->
    <header>
      <div class="wrap">
        <div class="head_container">
          <div class="profile">
            <div class="profile_img">
              <img src="{{asset('site/assets/profile.webp')}}" alt="" />
            </div>
            <div class="profile_txt">
              <span id=""  data-translate="profile_txt">مرحبا بك</span>
              <h3 id=""  data-translate="profile_title"> {{$attendance->name}}</h3>
            </div>
          </div>
          <div class="menu_icon">
           {{-- <a href="{{route('invitation.third',[$attendance->id,request()->course_id])}}"> <img src="{{asset('site/assets/icons8-hamburger-menu-50.png')}}" alt="" /></a> --}}
          </div>
        </div>
      </div>
    </header>
    @yield('content')

      <script src="{{asset('site/main.js')}}"></script>
    </body>
  </html>
