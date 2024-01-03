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

                <!-- your.blade.view.blade.php -->

                <div class="data_container">
                    <div class="calendar">
                        <div class="months">
                            @foreach ($groupedCourses as $month => $courses)
                                <div class="month{{ $loop->first ? ' active' : '' }}"
                                    data-translate="{{ strtolower($month) }}">{{ $month }}</div>
                            @endforeach
                        </div>
                        <div class="dates">
                            @foreach ($groupedCourses as $month => $courses)
                                <div class="date{{ $loop->first ? ' active' : '' }}">
                                    @foreach ($courses as $course)
                                        <div class="df g1 jc-sb">
                                            <p data-translate="starts_in">يبدأ فى</p>
                                            <p>{{ $course['start_date'] }}</p>
                                        </div>
                                        <div class="df g1 jc-sb">
                                            <p data-translate="ends_in">ينتهى فى</p>
                                            <p>{{ $course['end_date'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="events">
                        <div class="event">
                            <div class="event_img">
                                <img src="assets/event2.png" alt="">
                                <div class="event_overlay">بروشور برنامج مؤشرات الأداء</div>
                            </div>
                            <div class="event_btn" data-translate="review" onclick="redirectToCoursePage('event_one')">استعراض</div>
                        </div>
                        <div class="event">
                            <div class="event_img">
                                <img src="assets/event1.png" alt="">
                                <div class="event_overlay">بروشور برنامج تحليل البيانات وإعداد التقارير   </div>
                            </div>
                            <div class="event_btn" data-translate="review" onclick="redirectToCoursePage('event_two')" >استعراض</div>
                        </div>


                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection
