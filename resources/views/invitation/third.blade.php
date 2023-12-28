@extends('invitation.master')
@section('content')
<section>
    <div class="wrap">
      <div class="container_cards">
        <div class="card">
          <div>
            <div class="card_title">
              <p>الاختبار القبلى</p>
            </div>
            <div class="card_text">
              <span  data-translate="submit">تم التقديم </span>
            </div>
          </div>
          <div class="card_icon">&#10140;</div>
        </div>

        <div class="card">
          <div>
            <div class="card_title">
              <p>التكليف</p>
            </div>
            <div class="card_text not">
              <span  data-translate="not_submit">لم يقدم </span>
            </div>
          </div>
          <div class="card_icon">&#10140;</div>
        </div>
        <div class="card">
          <div>
            <div class="card_title">
              <p>الاختبار التفاعلي</p>
            </div>
            <div class="card_text">
              <span  data-translate="submit">تم التقديم </span>
            </div>
          </div>
          <div class="card_icon">&#10140;</div>
        </div>
        <div class="card">
          <div>
            <div class="card_title">
              <p>الاختبار البعدي</p>
            </div>
            <div class="card_text">
              <span  data-translate="submit">تم التقديم </span>
            </div>
          </div>
          <div class="card_icon">&#10140;</div>
        </div>
      </div>
      <div class="btn_links">
        <button  data-translate="show_results">عرض النتائج</button>
        <button  data-translate="contact_coach">التواصل مع المدرب</button>
      </div>
    </div>
  </section>
@endsection
