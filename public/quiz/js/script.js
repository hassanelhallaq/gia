// تحديد العناصر من واجهة المستخدم باستخدام Selectors
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

// عند النقر على زر بدء الاختبار
start_btn.onclick = () => {
    info_box.classList.add("activeInfo"); // إظهار صندوق المعلومات
}

// عند النقر على زر الخروج من الاختبار
exit_btn.onclick = () => {
    info_box.classList.remove("activeInfo"); // إخفاء صندوق المعلومات
}

// عند النقر على زر الاستمرار في الاختبار
continue_btn.onclick = () => {
    info_box.classList.remove("activeInfo"); // إخفاء صندوق المعلومات
    quiz_box.classList.add("activeQuiz"); // إظهار صندوق الاختبار
    showQuestions(0); // استدعاء دالة عرض الأسئلة
    queCounter(1); // تمرير قيمة واحدة كمعلمة إلى دالة تحديد عدد الأسئلة
    startTimer(timeValue); // استدعاء دالة بدء العد التنازلي
    startTimerLine(0); // استدعاء دالة بدء عداد الخط الزمني
}

// تعيين القيم الابتدائية
let timeValue = 120;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

// عند النقر على زر الخروج من الاختبار
const quit_quiz = result_box.querySelector(".buttons .quit");
quit_quiz.onclick = () => {
    const currentPath = window.location.pathname;
    const pathSegments = currentPath.split('/');
    const quizId = pathSegments[pathSegments.length - 2];
    const clientId = pathSegments[pathSegments.length - 1];

    // بناء عنوان URL للتوجيه باستخدام JavaScript الخام
    let redirectUrl = '/back/' + clientId + '/' + quizId;

    // تنفيذ التوجيه
    window.location.href = redirectUrl;

    // window.location.reload(); // إعادة تحميل النافذة الحالية
}

// تحديد زر التالي وعداد عدد الأسئلة
const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

// عند النقر على زر التالي
next_btn.onclick = () => {
    if (que_count < questions.length - 1) { // إذا كان عدد الأسئلة أقل من إجمالي عدد الأسئلة
        que_count++; // زيادة قيمة عدد الأسئلة
        que_numb++; // زيادة قيمة رقم السؤال
        showQuestions(que_count); // استدعاء دالة عرض الأسئلة
        queCounter(que_numb); // تمرير قيمة رقم السؤال إلى دالة تحديد عدد الأسئلة
        clearInterval(counter); // إيقاف العداد
        clearInterval(counterLine); // إيقاف عداد الخط الزمني
        startTimer(timeValue); // استدعاء دالة بدء العد التنازلي
        startTimerLine(widthValue); // استدعاء دالة بدء عداد الخط الزمني
        timeText.textContent = "وقت الاختبار"; // تغيير نص الوقت إلى "وقت الاختبار"
        next_btn.classList.remove("show"); // إخفاء زر "التالي"
    } else {
        clearInterval(counter); // إيقاف العداد
        clearInterval(counterLine); // إيقاف عداد الخط الزمني
        showResult(); // استدعاء دالة عرض النتائج
        moveToNextQuestion();
    }
}

// استجابة الصفحة بعد التحميل
document.addEventListener("DOMContentLoaded", function () {
    // استخراج معرف الاختبار من عنوان URL (يمكنك استخدام أي طريقة للحصول على المعرف)
    const currentPath = window.location.pathname;
    const pathSegments = currentPath.split('/');
    const quizId = pathSegments[pathSegments.length - 2]; // نفترض أن معرف الاختبار هو القيمة قبل الأخيرة
    const clientId = pathSegments[pathSegments.length - 1];

    // جلب بيانات الاختبار من الخلفية في Laravel باستخدام معرف الاختبار
    fetch(`/quiz/index/${quizId}/${clientId}`)
        .then(response => response.json())
        .then(data => {
            // معالجة البيانات المستلمة
            questions = data.questions;
            // استدعاء دالة عرض الأسئلة لعرض السؤال الأول
            showQuestions(0);
        })
        .catch(error => console.error('خطأ في جلب بيانات الاختبار:', error));
});

// (الكود الخاص بالاختبار الآخر)...

// الحصول على الأسئلة والخيارات من المصفوفة
function showQuestions(index) {
    const que_text = document.querySelector(".que_text");

    let que_tag = '<span>' + questions[index].name + '</span>';
    que_text.innerHTML = que_tag;

    let option_tag = '';
    questions[index].options.forEach(option => {
        option_tag += '<div class="option" data-is-correct="' + option.is_corect + '" data-option-id="' + option.id + '"><span>' + option.answer + '</span></div>';
    });

    option_list.innerHTML = option_tag;

    const options = option_list.querySelectorAll(".option");
    options.forEach(option => {
        option.addEventListener("click", function () {
            optionSelected(this);
        });
    });

    next_btn.classList.remove("show"); // إخفاء زر "التالي"
}
next_btn.addEventListener("click", function () {
    que_count + 1;
    console.log(que_count);
    if (que_count < questions.length) {
        showQuestions(que_count);
        next_btn.classList.remove("show");
        // You may want to reset any styles or icons applied to the options in the previous question
    } else {
        // Handle the end of the quiz (no more questions)
        console.log("End of quiz");
        // You can redirect, show a summary, etc.
    }
});

// creating the new div tags which for icons
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';

let userAnswers = [];

// دالة للتعامل مع اختيار الخيار
function optionSelected(answer) {
    clearInterval(counter); // إيقاف العداد
    clearInterval(counterLine); // إيقاف عداد الخط الزمني

    let userAns = answer.textContent; // الحصول على الخيار الذي اختاره المستخدم
    let isCorrect = answer.getAttribute("data-is-correct") === "1"; // التحقق مما إذا كان الخيار المختار صحيحًا
    const allOptions = option_list.children.length; // الحصول على كل عناصر الخيارات
    let chosenOptionId = answer.getAttribute("data-option-id");

    console.log(isCorrect);

    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

    if (isCorrect) {
        userScore += 1; // زيادة قيمة النقاط بمقدار 1
        answer.classList.add("correct"); // إضافة لون أخضر للاختيار الصحيح المحدد
        answer.insertAdjacentHTML("beforeend", tickIconTag); // إضافة أيقونة الصحيح للاختيار المحدد
        console.log("الإجابة صحيحة");
        console.log("الإجابات الصحيحة الخاصة بك = " + userScore);
    } else {
        answer.classList.add("incorrect"); // إضافة لون أحمر للاختيار الغير صحيح المحدد
        answer.insertAdjacentHTML("beforeend", crossIconTag); // إضافة أيقونة الخاطئ للاختيار المحدد
        console.log("الإجابة خاطئة");
    }

    for (let i = 0; i < allOptions; i++) {

            option_list.children[i].classList.add("disabled"); // تعطيل جميع الخيارات ما عدا الخيار المحدد

    }

    next_btn.classList.add("show"); // إظهار زر "التالي"

    // حفظ إجابة المستخدم
    fetch('/quiz/save-answer', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            question_id: questions[que_count].id,
            user_id: clientId,
            chosen_option: chosenOptionId,
        }),
    })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('خطأ في حفظ الإجابة:', error));
}


// (الكود الخاص بالانتقال إلى السؤال التالي)...
function moveToNextQuestion() {
    que_count++;
    saveUserAnswers();
}

// (الكود الخاص بحفظ جميع إجابات المستخدم)...
function saveUserAnswers() {
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    fetch('/quiz/save-answer', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            user_answers: userAnswers,
        }),
    })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error saving answers:', error));
}


// (الكود الخاص بعرض النتائج)

function showResult() {
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.remove("activeQuiz"); //hide quiz box
    result_box.classList.add("activeResult"); //show result box
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3) {
        // if user scored more than 3
        //creating a new span tag and passing the user score number and total question number
        let scoreTag = '<span>and congrats! 🎉, You got <p>' + userScore + '</p> out of <p>' + questions.length + '</p></span>';
        scoreText.innerHTML = scoreTag;  //adding new span tag inside score_Text
    }
    else if (userScore > 1) { // if user scored more than 1
        let scoreTag = '<span>and nice 😎, You got <p>' + userScore + '</p> out of <p>' + questions.length + '</p></span>';
        scoreText.innerHTML = scoreTag;
    }
    else { // if user scored less than 1
        let scoreTag = '<span>and sorry 😐, You got only <p>' + userScore + '</p> out of <p>' + questions.length + '</p></span>';
        scoreText.innerHTML = scoreTag;
    }
}
// (الكود الخاص ببدء العد التنازلي للوقت)...
function startTimer(time) {
    counter = setInterval(timer, 1000);
    function timer() {
        timeCount.textContent = time; //changing the value of timeCount with time value
        time--; //decrement the time value
        if (time < 9) { //if timer is less than 9
            let addZero = timeCount.textContent;
            timeCount.textContent = "0" + addZero; //add a 0 before time value
        }
        if (time < 0) { //if timer is less than 0
            clearInterval(counter); //clear counter
            timeText.textContent = "Time Off"; //change the time text to time off
            const allOptions = option_list.children.length; //getting all option items
            let correcAns = questions[que_count].answer; //getting correct answer from array
            for (i = 0; i < allOptions; i++) {
                if (option_list.children[i].textContent == correcAns) { //if there is an option which is matched to an array answer
                    option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                    option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for (i = 0; i < allOptions; i++) {
                option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
            }
            next_btn.classList.add("show"); //show the next button if user selected any option
        }
    }
}
// (الكود الخاص ببدء عداد الخط الزمني)
function startTimerLine(time) {
    counterLine = setInterval(timer, 29);
    function timer() {
        // time += 1; //upgrading time value with 1
        // time_line.style.width = time + "px"; //increasing width of time_line with px by time value
        // if (time > 549) { //if time value is greater than 549
        //     clearInterval(counterLine); //clear counterLine
        // }
    }
}

// (الكود الخاص بتحديد عدد الأسئلة)...
function queCounter(index) {
    //creating a new span tag and passing the question number and total question
    let totalQueCounTag = '<span><p>' + index + '</p> of <p>' + questions.length + '</p> Questions</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
}
