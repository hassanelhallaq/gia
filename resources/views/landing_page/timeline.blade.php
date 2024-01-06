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
                                <div class="month{{ $loop->first ? ' ' : '' }}"
                                    data-translate="{{ strtolower($month) }}">{{ $month }}</div>
                            @endforeach
                        </div>
                        <div class="dates">
                            @foreach ($groupedCourses as $month => $courses)
                                @foreach ($courses as $course)
                                    <div class="date{{ $loop->first ? ' ' : '' }}"
                                        data-month="{{ strtolower(date('F', strtotime($course['start_date']))) }}">
                                        <div class="df g1 jc-sb">
                                            <p data-translate="starts_in">يبدأ فى</p>
                                            <p>{{ date('n/j/Y', strtotime($course['start_date'])) }}</p> <!-- Adjust the date format here -->
                                        </div>
                                        <div class="df g1 jc-sb">
                                            <p data-translate="ends_in">ينتهى فى</p>
                                            <p>{{ date('n/j/Y', strtotime($course['end_date'])) }}</p> <!-- Adjust the date format here -->
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                    </div>

                    <div class="events">
                        @foreach ($program->courses as $course)
                            <div class="event {{ strtolower(date('F', strtotime($course->start))) }}" data-event-id="{{$course->id}}">
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


<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle click event on dates
        $('.dates .date').click(function () {
            // Get the clicked date
            var clickedDate = $(this).find('p[data-translate="starts_in"]').next().text();

            // Make an AJAX request to the backend
            $.ajax({
                url: 'get-events', // Update this to your backend route
                method: 'GET',
                data: { date: clickedDate },
                success: function (response) {
                    // Update events based on the response
                    updateEvents(response);
                },
                error: function (error) {
                    console.error('Error fetching events:', error);
                }
            });
        });

        // Function to update events
        function updateEvents(events) {
            // Hide all events initially
            $('.events .event').hide();

            // Show events related to the clicked date
            events.forEach(function (event) {
                $('.events .event[data-event-id="' + event.id + '"]').show();
            });
        }
    });
</script>






@endsection
