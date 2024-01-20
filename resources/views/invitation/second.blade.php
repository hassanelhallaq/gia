@extends('invitation.master')
@section('content')
<section>
    <div class="wrap  mb-5">
      <div class="vedio_container">
        <div class="vedio">
          <img src="{{ asset($course->profile) }}" alt="" />
        </div>
        <div class="vedio_discription">
          <div class="title">
            <h3>{{ $course->name }}</h3>
          </div>
          <div class=" d-flex justify-content-between">
            <span class="accepted" data-translate="accepted"> تم القبول </span>
            {{-- <div class="dropdown">
                <span> متطلبات الحصول على الشهادة  </span>
                <div class="dropdown-content">
                  <p>نسبة الإلتزام 80% من الحضور</p>
                  <p>تقديم الأختبار القبلي</p>
                  <p>تقديم الأختبار البعدي</p>
                  <p> تقديم نموذج الحصول على الشهادة </p>
                  <p>تقديم تقييم الحدث</p>
                </div>

          </div> --}}
          <div class="disc">
            <p class="tx-14">
                {{ $course->desc }}

            </p>
          </div>
        </div>
        <div class="btn_links">
          <a data-translate="btn_1" href="{{ route('invitation.files',[$attendance->id,request()->course_id]) }} "> المادة العلمية للدورة </a>
          <a data-translate="btn_2" href="{{route('invitation.third',[$attendance->id,request()->course_id])}}" >الانشطة</a>
        </div>
        <div class="btn_links">

            <button class="btn_primery" onclick="togglePopup()" type="button" class="df ai-c jc-c g1 w-25" data-translate="signup"> تسجيل الدخول</button>
            <a class="btn-border-block" data-translate="btn_2" target="_blank" href="{{ $course->location }}"> موقع التدريب <i class="bi bi-geo-alt ml-3"></i></a>

        </div>
      </div>
    </div>
  </section>


<div class="overlay">
    <div class="wrap">
      <div class="qr_container df f-c  ai-c g1 p-40">
        <span class="close" onclick="togglePopup()">&times;</span>
          {{-- <img src="{{asset('site/assets/logo.png')}}" alt=""> --}}
          <img src="{{asset($attendance->qr)}}" alt="">
          <p  data-translate="qr_text"> الرجاء عرض رمز الدخول السريع حتى يتم تسجيل الدخول بالدورة </p>
      </div>
    </div>
</div>
@endsection
