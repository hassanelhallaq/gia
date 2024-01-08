@extends('invitation.master')
@section('content')
<section>
    <div class="wrap">
      <div class="vedio_container">
        <div class="vedio">
          <img src="{{ asset($course->image) }}" alt="" />
        </div>
        <div class="vedio_discription">
          <div class="title">
            <h3>{{ $course->program->name }}</h3>
          </div>
          <span class="accepted" data-translate="accepted"> تم القبول </span>
          <div class="disc">
            <p>
                {{ $course->program->content_two }}

            </p>
          </div>
        </div>
        <div class="btn_links">
          <button data-translate="btn_1" href="{{ asset($course->subject) }}" download>المادة التدريبية</button>

          <button data-translate="btn_2" href="{{ asset($course->assignment) }}" download>الانشطة</button>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="wrap">
      <div class="btn_primery">
        <button    onclick="togglePopup()"
            type="button" class="df ai-c jc-c g1" data-translate="signup">

          <i class="fa fa-qrcode" style="font-size:24px;color:white;"></i>
          تسجيل الدخول
        </button>
      </div>
    </div>
  </footer>

  <div class="overlay">
    <div class="wrap">
      <div class="qr_container df f-c  ai-c g1">
        <span class="close" onclick="togglePopup()">&times;</span>
          <img src="{{asset('site/assets/logo.png')}}" alt="">
          <img src="{{asset($attendance->qr)}}" alt="">
          <p  data-translate="qr_text">برجاء عرض رمز الدخول السريع للمنسق حتى يتم تسجيل القبول بالدورة </p>
          <div class="btn_links">
            <button  data-translate="enter">دخول </button>
          </div>
      </div>
    </div>
  </div>
@endsection
