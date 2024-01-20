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

// if startQuiz button clicked
start_btn.onclick = () => {
    info_box.classList.add("activeInfo"); //show info box
}

// if exitQuiz button clicked
exit_btn.onclick = () => {
    info_box.classList.remove("activeInfo"); //hide info box
}

// if continueQuiz button clicked
// if continueQuiz button clicked
continue_btn.onclick = () => {
    info_box.classList.remove("activeInfo"); // hide info box
    quiz_box.classList.add("activeQuiz"); // show quiz box
    showQuestions(0); // calling showQuestions function instead of showQuetions
    queCounter(1); // passing 1 parameter to queCounter
    startTimer(timeValue); // calling startTimer function
    startTimerLine(0); // calling startTimerLine function
}


let timeValue = 120;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

const quit_quiz = result_box.querySelector(".buttons .quit");

// if quitQuiz button clicked
quit_quiz.onclick = () => {
    const currentPath = window.location.pathname;
    const pathSegments = currentPath.split('/');
    const quizId = pathSegments[pathSegments.length - 2];
    const clientId = pathSegments[pathSegments.length - 1];

    // Construct the redirect URL using raw JavaScript
    let redirectUrl = '/back/' + clientId + '/' + quizId;

    // Perform the redirection
    window.location.href = redirectUrl;

    // window.location.reload(); //reload the current window
}

const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

// if Next Que button clicked
next_btn.onclick = () => {
    if (que_count < questions.length - 1) { //if question count is less than total question length
        que_count++; //increment the que_count value
        que_numb++; //increment the que_numb value
        showQuestions(que_count); //calling showQestions function
        queCounter(que_numb); //passing que_numb value to queCounter
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        startTimer(timeValue); //calling startTimer function
        startTimerLine(widthValue); //calling startTimerLine function
        timeText.textContent = "وقت الاختبار"; //change the timeText to وقت الاختبار
        next_btn.classList.remove("show"); //hide the next button
    } else {
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        showResult(); //calling showResult function
        moveToNextQuestion();

    }
}
document.addEventListener("DOMContentLoaded", function () {
    // Extract quiz ID from the URL (you can use any method to get the ID)

    // Extract quiz ID from the URL path
    const currentPath = window.location.pathname;
    const pathSegments = currentPath.split('/');
    const quizId = pathSegments[pathSegments.length - 2]; // Assuming quizId is the second-to-last segment
    const clientId = pathSegments[pathSegments.length - 1];

    // Fetch quiz data from Laravel backend with the quiz ID
    fetch(`/quiz/index/${quizId}/${clientId}`)
        .then(response => response.json())
        .then(data => {
            // Process the retrieved data
            questions = data.questions;
            // Call the showQuestions function to display the first question
            showQuestions(0);
        })
        .catch(error => console.error('Error fetching quiz data:', error));
});

// Other quiz-related JavaScript code...

// getting questions and options from array
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

    next_btn.classList.remove("show"); // هذا يفترض بإخفاء زر "التالي"
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

// Function to handle option selection
function optionSelected(answer) {
    clearInterval(counter); // Clear counter
    clearInterval(counterLine); // Clear counterLine
    let userAns = answer.textContent; // Get user selected option
    let isCorrect = answer.getAttribute("data-is-correct") === "1"; // Check if the selected option is correct
    const allOptions = option_list.children.length; // Get all option items
    let chosenOptionId = answer.getAttribute("data-option-id");

    console.log(isCorrect);
    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    if (isCorrect) {
        userScore += 1; // Upgrade score value by 1
        answer.classList.add("correct"); // Add green color to correct selected option
        answer.insertAdjacentHTML("beforeend", tickIconTag); // Add tick icon to correct selected option
        console.log("Correct Answer");
        console.log("Your correct answers = " + userScore);
        const currentPath = window.location.pathname;
        const pathSegments = currentPath.split('/');
        const quizId = pathSegments[pathSegments.length - 2]; // Assuming quizId is the second-to-last segment
        const clientId = pathSegments[pathSegments.length - 1];
        fetch('/quiz/save-answer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers

            },
            body: JSON.stringify({
                question_id: questions[que_count].id, // Assuming you have an 'id' property in your question object
                user_id: clientId, // Replace with the actual user ID (you can get it from your authentication system)
                chosen_option: chosenOptionId,
            }),
        })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error saving answer:', error));

    } else {
        answer.classList.add("incorrect"); // Add red color to incorrect selected option
        answer.insertAdjacentHTML("beforeend", crossIconTag); // Add cross icon to incorrect selected option
        console.log("Wrong Answer");
        const currentPath = window.location.pathname;
        const pathSegments = currentPath.split('/');
        const quizId = pathSegments[pathSegments.length - 2]; // Assuming quizId is the second-to-last segment
        const clientId = pathSegments[pathSegments.length - 1];
        fetch('/quiz/save-answer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers

            },
            body: JSON.stringify({
                question_id: questions[que_count].id, // Assuming you have an 'id' property in your question object
                user_id: clientId, // Replace with the actual user ID (you can get it from your authentication system)
                chosen_option: chosenOptionId,
            }),
        })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error saving answer:', error));
        for (let i = 0; i < allOptions; i++) {
            if (option_list.children[i].getAttribute("data-is-correct") === "1") {
                option_list.children[i].setAttribute("class", "option correct"); // Add green color to correct option
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); // Add tick icon to correct option
                console.log("Auto selected correct answer.");
            }
        }
    }

    for (let i = 0; i < allOptions; i++) {
        option_list.children[i].classList.add("disabled"); // Once user selects an option, disable all options
    }

    next_btn.classList.add("show"); // هذا يفترض بإظهار زر "التالي"
}


// Function to move to the next question
function moveToNextQuestion() {
    que_count++;
    saveUserAnswers();
}

// Function to save all user answers
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



function showResult() {
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.remove("activeQuiz"); //hide quiz box
    result_box.classList.add("activeResult"); //show result box
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3) { // if user scored more than 3
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

function queCounter(index) {
    //creating a new span tag and passing the question number and total question
    let totalQueCounTag = '<span><p>' + index + '</p> of <p>' + questions.length + '</p> Questions</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
}

