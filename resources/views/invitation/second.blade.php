@extends('invitation.master')
@section('content')
<section>
    <div class="wrap">
      <div class="vedio_container">
        <div class="vedio">
          <img src="{{ asset($course->program->image) }}" alt="" />
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
@endsection
