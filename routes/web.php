<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceCourseController;
use App\Http\Controllers\AttendanceLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseFileController;
use App\Http\Controllers\CourseLinkController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserAnswerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('dashboard')->middleware('guest:admin,client')->group(function () {
    Route::get('{guard}/login', [App\Http\Controllers\UserAuthController::class, 'showLogin'])->name('dashboard.login');
    Route::post('{guard}/login', [App\Http\Controllers\UserAuthController::class, 'login']);
});
Route::prefix('dashboard/admin')->middleware('auth:admin,client,trainer')->group(
    function () {
        Route::resource('courses', CourseController::class);
        Route::get('/courses.attendances/{id}', [AttendanceCourseController::class, 'coursesAttendance'])->name('course.attendance');
        Route::get('/attendance-summery/{id}/{attendanceId}', [UserAnswerController::class, 'userAswers'])->name('attendance.summery');
        Route::resource('programs', ProgramController::class);
        Route::get('/program.courses/{id}', [CourseController::class, 'programCourses'])->name('program.course');

    }
);
Route::prefix('dashboard/admin')->middleware('auth:admin,client')->group(
    function () {
        Route::get('/program.courses/{id}/create', [CourseController::class, 'createCourse'])->name('program.course.create');
        Route::get('/get-courses/{id}', [CourseController::class, 'getCoureses']);
        Route::resource('questions', QuestionController::class);
        Route::resource('attendance', AttendanceController::class);
        Route::get('/programs-grid', [ProgramController::class, 'gridView'])->name('programs.grid');
        Route::get('/quiz.questions/{id}', [QuizController::class, 'question'])->name('quiz.questions');
        Route::resource('quizes', QuizController::class);
        Route::get('/duplicate/{id}', [CourseController::class, 'question'])->name('duplicate.courses');
        Route::get('/{id}/{course_id}/login', [AttendanceLoginController::class, 'login'])->name('attendance.login');
        Route::post('/attendance-sms', [CourseController::class, 'sendSms'])->name('attendance.sms');
        Route::get('/course/xlsx', [CourseController::class, 'courseXlsx'])->name('course.xlsx');
        Route::get('/program/xlsx', [ProgramController::class, 'programXlsx'])->name('programs.xlsx');
        Route::put('/status-update/{id}', [CourseController::class, 'updateStatus'])->name('update.status');
        Route::post('/attendance-sms/selected', [CourseController::class, 'sendSmsSelected'])->name('attendance.sms.selected');

        // روت مؤقت
        Route::get('/quiz/detales', function () {
            return view('dashboard.quiz.detales');
        })->name('quiz_detales');
        Route::get('/Certificate_management', function () {
            return view('dashboard.attendance.Certificate_management');
        })->name('Certificate_management');
    }
);
Route::prefix('dashboard/trainer')->middleware('auth:trainer')->group(
    function () {
        Route::get('/', [CourseController::class, 'index'])->name('trainer.dashboard');
    }
);
Route::prefix('dashboard/client')->middleware('auth:client')->group(
    function () {
        Route::get('/', [PagesController::class, 'index'])->name('client.dashboard');
    }
);
Route::prefix('dashboard/admin')->middleware('auth:admin')->group(
    function () {
        Route::get('logout', [App\Http\Controllers\UserAuthController::class, 'logout'])->name('dashboard.auth.logout');
        Route::get('/', [PagesController::class, 'index'])->name('admin.dashboard');
        Route::resource('categories', CategoryController::class);
        Route::get('/get-cities/{id}', [CityController::class, 'getCities']);
        Route::resource('clients', ClientController::class);
        Route::resource('attendance', AttendanceController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('trainers', TrainerController::class);
        Route::post('/courses-files', [CourseFileController::class, 'store']);
        Route::post('/courses-links', [CourseLinkController::class, 'store']);
    }
);
Route::get('/invitation/{id}/{course_id}', [SiteController::class, 'index'])->name('invitation.index');
Route::get('/accept/{id}/{course_id}', [SiteController::class, 'second'])->name('invitation.second');
Route::get('/third/{id}/{course_id}', [SiteController::class, 'third'])->name('invitation.third');
Route::get('/back/{id}/{quiz_id}', [SiteController::class, 'backInvetaion'])->name('invitation.back');
Route::get('/files/{id}/{course_id}', [SiteController::class, 'files'])->name('invitation.files');
Route::get('/Certificate_Issuance_form/{id}/{course_id}', [SiteController::class, 'certificateIssuance'])->name('Certificate_Issuance_form');
Route::post('/ateendance/update/{id}/{course_id}', [SiteController::class, 'ateendanceUpdate'])->name('ateendance.update');
Route::get('/third_connect/{id}/{course_id}', [SiteController::class, 'thirdContact'])->name('third_connect');

Route::post('/invitation/reply', [SiteController::class, 'storeReply']);
Route::prefix('/{username}')->group(
    function () {
        Route::get('/home', [LandingPageController::class, 'home'])->name('home');
        Route::get('/time-line', [LandingPageController::class, 'timeLine'])->name('timeLine');
        Route::get('/get-events', [LandingPageController::class, 'getEvent'])->name('get.events');
    }
);
Route::get('/quiz/index/{quizId}/{clientId}', [SiteController::class, 'quiz'])->name('quiz.questions.index');
Route::get('/quiz/questions/{quizId}/{clientId}', [SiteController::class, 'quizView'])->name('quiz.view');
Route::get('/quiz/save-answer', [SiteController::class, 'quizView']);
Route::post('/quiz/save-answer', [SiteController::class, 'saveAnswer']);
