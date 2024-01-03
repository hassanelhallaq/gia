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
                    <!-- your.blade.view.blade.php -->

                    <div class="calendar">
                        <div class="months">
                            @foreach ($groupedCourses as $month => $courses)
                                <div class="month{{ $loop->first ? ' active' : '' }}"
                                    data-translate="{{ strtolower($month) }}">{{ $month }}</div>
                            @endforeach
                        </div>
                        <div class="dates">
                            @foreach ($groupedCourses as $month => $courses)
                                @foreach ($courses as $course)
                                    <div class="date{{ $loop->first ? ' active' : '' }}"
                                        data-month="{{ strtolower(date('F', strtotime($course['start_date']))) }}">
                                        <div class="df g1 jc-sb">
                                            <p data-translate="starts_in">يبدأ فى</p>
                                            <p>{{ $course['start_date'] }}</p>
                                        </div>
                                        <div class="df g1 jc-sb">
                                            <p data-translate="ends_in">ينتهى فى</p>
                                            <p>{{ $course['end_date'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="events">
                        @foreach ($program->courses as $course)
                            <div class="event {{ strtolower(date('F', strtotime($course->start))) }}">
                                <div class="event_img">
                                    <img src="assets/event1.png" alt="">
                                    <div class="event_overlay">{{ $course->name }}</div>
                                </div>
                                <div class="event_btn" data-translate="review"
                                    onclick="redirectToCoursePage('{{ $course->id }}')">استعراض</div>
                            </div>
                        @endforeach
                    </div>


                </div>




            </div>
        </div>
    </section>
@endsection
@section('js')
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Hide all events initially
        $('.events .event').hide();

        // Handle click event on dates
        $('.dates .date').click(function() {
            // Get the month associated with the clicked date
            var month = $(this).data('month');

            // Hide all events
            $('.events .event').hide();

            // Show events related to the clicked month
            $('.events .event.' + month).show();
        });
    });
</script>

@endsection
