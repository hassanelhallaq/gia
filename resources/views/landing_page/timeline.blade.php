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
                                    <img src="{{asset('landingPage/assets/event1.png')}}" alt="">
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
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- your.blade.view.blade.php -->

<!-- Include Moment.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(document).ready(function () {
        // Hide all events initially
        $('.events .event').hide();

        // Handle click event on dates
        $('.dates .date').click(function () {
            // Get the clicked date
            var clickedDate = $(this).find('p[data-translate="starts_in"]').next().text();

            // Parse the clicked date using Moment.js
            var clickedDateObject = moment(clickedDate, 'M/D/YYYY');

            // Hide all events
            $('.events .event').hide();

            // Show events related to the clicked date
            $('.events .event').each(function () {
                var startDate = $(this).find('p[data-translate="starts_in"]').next().text();
                var endDate = $(this).find('p[data-translate="ends_in"]').next().text();

                // Parse the start and end dates using Moment.js
                var startDateObject = moment(startDate, 'M/D/YYYY');
                var endDateObject = moment(endDate, 'M/D/YYYY');

                // Check if the clicked date is within the course date range
                if (clickedDateObject.isSameOrAfter(startDateObject) && clickedDateObject.isSameOrBefore(endDateObject)) {
                    $(this).show();
                }
            });
        });
    });
</script>



@endsection
