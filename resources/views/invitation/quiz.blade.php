<!-- Created By CodingNepal - www.codingnepalweb.com  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome Quiz App | CodingNepal</title>
    <link rel="stylesheet" href="{{asset('quiz/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=Tajawal:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div class="logoquiz">
        <img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="fu" alt="">
    </div>
    <!-- start Quiz button -->

    <!-- Info Box -->
<div class="mainqu">
    <div class="mainto">
    <div class="start_btn"><button> ابدأ الاختبار </button></div>

    <div class="info_box">

        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <button class="quit"> الغاء </button>
            <button class="restart">الاستمرار</button>
        </div>
    </div>
    <br><br>


    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">اجب على الاسئلة الاتية ↶</div>
            <div class="timer">
                <div class="time_left_txt"> وقت الاختبار </div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">السؤال التالي</button>
        </footer>
    </div>
    <br><br><br>


    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">

             <a  href="{{route('invitation.back',[$id,$clientId])}}" class="quit">العودة الى الرئيسية</a>

        </div>
    </div>
    <br><br>

</div>
</div>
    <script src="{{asset('quiz/js/script.js')}}"></script>

</body>
</html>
