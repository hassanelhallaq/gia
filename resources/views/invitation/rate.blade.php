@extends('invitation.master')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <section>

        <div class="wrap">
            <div class="container_cards">
                @foreach ($rates as $item)
                    <div class="card">
                        <div class="card_title">
                            <p>{{ $item->question }}</p>
                        </div>
                        <input id="attendance_id" value="{{ $attendance->id }}" hidden>
                        <input id="course_id" value="{{ $course->id }}" hidden>
                        <div class="rate" data-question-id="{{ $item->id }}">
                            <input type="radio" id="star5_{{ $item->id }}" name="rate_{{ $item->id }}" value="5" />
                            <label for="star5_{{ $item->id }}" title="text">5 stars</label>

                            <input type="radio" id="star4_{{ $item->id }}" name="rate_{{ $item->id }}" value="4" />
                            <label for="star4_{{ $item->id }}" title="text">4 stars</label>

                            <input type="radio" id="star3_{{ $item->id }}" name="rate_{{ $item->id }}" value="3" />
                            <label for="star3_{{ $item->id }}" title="text">3 stars</label>

                            <input type="radio" id="star2_{{ $item->id }}" name="rate_{{ $item->id }}" value="2" />
                            <label for="star2_{{ $item->id }}" title="text">2 stars</label>

                            <input type="radio" id="star1_{{ $item->id }}" name="rate_{{ $item->id }}" value="1" />
                            <label for="star1_{{ $item->id }}" title="text">1 star</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn_links">
                <button class="btn_primery" data-translate="show_results" id="submitAllRatings">
                    <i class="bi bi-arrow-right tx-white"></i> ارسال التقيمات
                </button>
                <a data-translate="show_results" href="{{ route('invitation.second', [$attendance->id, request()->course_id]) }}">
                    <i class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية
                </a>
            </div>
        </div>

    </section>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ratings = {};

    document.querySelectorAll('.rate').forEach(function (rateContainer) {
        var questionId = rateContainer.getAttribute('data-question-id');
        var ratingInputs = rateContainer.querySelectorAll('input[type="radio"]');

        ratingInputs.forEach(function (ratingInput) {
            ratingInput.addEventListener('click', function () {
                var selectedRating = document.querySelector('input[name="rate_' + questionId + '"]:checked');

                if (selectedRating) {
                    ratings[questionId] = selectedRating.value;
                } else {
                    alert('Please select a rating for question ' + questionId + ' before submitting.');
                }
            });
        });
    });

    document.getElementById('submitAllRatings').addEventListener('click', function () {
        // Send all ratings to the backend
        sendAllRatingsToBackend(ratings);
    });

    function sendAllRatingsToBackend(ratings) {
        var linkId = document.getElementById('attendance_id').value;
        var courseId = document.getElementById('course_id').value;
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

        // Check if ratings object is empty
        if (Object.keys(ratings).length === 0) {
            alert('Please select at least one rating before submitting.');
            return;
        }

        // Make an AJAX request to send all ratings to the Laravel backend
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/submitRating/' + linkId + '/' + courseId, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Set the CSRF token in the header

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Redirect to the desired route after successful submission
                    window.location.href = "{{ route('invitation.second', [$attendance->id, request()->course_id]) }}";
                } else {
                    console.error('Error in submitting ratings');
                }
            }
        };

        xhr.send(JSON.stringify({
            ratings: ratings
        }));
    }
});



</script>
