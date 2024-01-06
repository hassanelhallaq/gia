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
                    <a href="{{ asset($course->subject) }}" download class="download-link">
                        <button data-translate="btn_1">المادة التدريبية</button>
                    </a>

                    <a href="{{ asset($course->assignment) }}" download class="download-link">
                        <button data-translate="btn_2">الانشطة</button>
                    </a>

                </div>
            </div>
        </div>
    </section>
@endsection
