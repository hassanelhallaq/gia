@extends('landing_page.master')
@section('content')
    <section class="main">
        <div class="wrap">
            <div class="timeline_container">
                <div class="t-c">
                    <h2 class="hero_titles" data-translate="timeline">
                        الجدول الزمني
                    </h2>

                    <span class="under_title"></span>
                </div>
                <!-- your.blade.view.blade.php -->

                <div class="data_container">
                    <div class="calendar">
                        <div class="months">
                            @foreach (['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر', 'نوفمبر', 'ديسمبر'] as $index => $month)
                                <div class="month{{ $index == 0 ? ' active' : '' }}"
                                    data-translate="{{ strtolower($month) }}">{{ $month }}</div>
                            @endforeach
                        </div>
                        <div class="dates">
                                 @foreach ($program->courses as $course)
                                    <div class="date">
                                        <div class="df g1 jc-sb">
                                            <p data-translate="starts_in">يبدأ فى</p>
                                            <p>{{ $course->start }}</p>
                                        </div>
                                        <div class="df g1 jc-sb">
                                            <p data-translate="ends_in">ينتهى فى</p>
                                            <p>{{ $course->start }}</p>
                                        </div>
                                    </div>
                                @endforeach
                         </div>
                    </div>
                    <div class="events">
                        {{-- Your event HTML remains unchanged --}}
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
