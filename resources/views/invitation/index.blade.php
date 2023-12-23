@extends('invitation.master')
@section('content')
<section>
    <div class="wrap">
      <div class="vedio_container">
        <div class="vedio">
          <img src="{{asset($course->program->image)}}" alt="" />
        </div>
        <div class="vedio_discription">
          <div class="title">
            <h3>{{$course ->name}}</h3>
          </div>
          <div class="disc">
            <p>
           {{$course->program->content_two}}
            </p>
          </div>
        </div>
        <div class="links">
          <a href="{{asset($course->subject)}}">عرض المادة التدريبية</a>
          <p class="icon">&#8592;</p>
        </div>
        <div class="btn_secondary">
          <div>
            <input
              type="radio"
              id="accept"
              name="acceptance"
              value="accept"
            />
            <label for="accept"  data-translate="accept">قبول</label>
          </div>
          <div>
            <input
              type="radio"
              id="refuse"
              name="acceptance"
              value="refuse"
            />
            <label for="refuse"  data-translate="refuse">رفض</label>
          </div>
        </div>
      </div>
    </div>
  </section>
     <!-- overlay pop up  qr code -->
     <div class="overlay  ">
      <div class="wrap">
        <div class="qr_container df f-c  ai-c g1">
          <span class="close" onclick="togglePopup()">&times;</span>
            <img src="assets/logo.png" alt="">
            <img src="assets/qr.png" alt="">
            <p  data-translate="qr_text">برجاء عرض رمز الدخول السريع للمنسق حتى يتم تسجيل القبول بالدورة </p>
            <div class="btn_links">
              <button  data-translate="enter">دخول </button>
            </div>
        </div>
      </div>
    </div>

    <footer>
        <div class="wrap">
          <div class="btn_primery">
            <button  data-translate="send">ارسال</button>
          </div>
        </div>
      </footer>
@endsection
