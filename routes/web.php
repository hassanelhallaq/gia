<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceCourseController;
use App\Http\Controllers\AttendanceLoginController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidateCourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseFileController;
use App\Http\Controllers\CourseLinkController;
use App\Http\Controllers\InvationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserAnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Models\Program;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('dashboard')->middleware('guest:admin,client')->group(function () {
    Route::get('{guard}/login', [App\Http\Controllers\UserAuthController::class, 'showLogin'])->name('dashboard.login');
    Route::post('{guard}/login', [App\Http\Controllers\UserAuthController::class, 'login']);
});
Route::prefix('dashboard/admin')->middleware('auth:admin,client,trainer')->group(
    function () {
                Route::get('logout', [App\Http\Controllers\UserAuthController::class, 'logout'])->name('dashboard.auth.logout');
        Route::resource('courses', CourseController::class);
        Route::get('/courses.attendances/{id}', [AttendanceCourseController::class, 'coursesAttendance'])->name('course.attendance');
        Route::get('/attendance-summery/{id}/{attendanceId}', [UserAnswerController::class, 'userAswers'])->name('attendance.summery');
        Route::get('/attendance-summery/after/{id}/{attendanceId}', [UserAnswerController::class, 'userAswersAfter'])->name('attendance.summery.after');
        Route::resource('programs', ProgramController::class);
        Route::get('/program.courses/{id}', [CourseController::class, 'programCourses'])->name('program.course');
        Route::resource('candidate', CandidatController::class);
        Route::post('/candidate/upload-excel/{courseId}', [CandidatController::class, 'upload'])->name('candidate.upload');
        Route::get('/candidat/xlsx/{id}', [CandidatController::class, 'candidatXlsx'])->name('candidat.xlsx');
        Route::post('/candidat-sms', [CandidatController::class, 'sendSms'])->name('candidat.sms');
        Route::post('/candidat-sms/selected', [CandidatController::class, 'sendSmsSelected'])->name('candidat.sms.selected');
        Route::get('/candidat_management/{id}', [CandidatController::class, 'acceptance'])->name('candidat.management');
        Route::get('/candidat-course/accetptance/{id}', [CandidateCourseController::class, 'acceptance'])->name('candidat.course.accetptance');
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
        Route::get('/duplicate/{id}', [CourseController::class, 'duplicate'])->name('duplicate.courses');
        Route::get('/duplicate-quiz/{id}', [QuizController::class, 'duplicate'])->name('duplicate.quiz');
        Route::get('/drepIn-quiz/{id}', [QuizController::class, 'drepIn'])->name('drepIn.quiz');
        Route::get('/{id}/{course_id}/login', [AttendanceLoginController::class, 'login'])->name('attendance.login');
        Route::post('/attendance-sms', [CourseController::class, 'sendSms'])->name('attendance.sms');
        Route::get('/course/xlsx', [CourseController::class, 'courseXlsx'])->name('course.xlsx');
        Route::get('/attendance/xlsx/{id}', [AttendanceController::class, 'attendanceXlsx'])->name('attendance.xlsx');
        Route::get('/quiz/xlsx/{id}', [QuizController::class, 'report'])->name('quiz.report');
        Route::get('/quizBefor/xlsx/{id}', [QuizController::class, 'quizBefor'])->name('quiz.befor.report');
        Route::get('/quizAfter/xlsx/{id}', [QuizController::class, 'quizAfter'])->name('quiz.after.report');
        Route::get('/quizRate/xlsx/{id}', [QuizController::class, 'quizRate'])->name('quiz.rate.report');
        Route::get('/program/xlsx', [ProgramController::class, 'programXlsx'])->name('programs.xlsx');
        Route::put('/status-update/{id}', [CourseController::class, 'updateStatus'])->name('update.status');
        Route::post('/attendance-sms/selected', [CourseController::class, 'sendSmsSelected'])->name('attendance.sms.selected');
        Route::get('/Certificate_management/{id}', [CertificateController::class, 'index'])->name('certificate.management');
        Route::post('/update-attendance-status', [AttendanceController::class, 'changeStatus'])->name('attendance.status');
        Route::get('/quiz/xlsx/{id}/{attendanceId}', [AttendanceController::class, 'QuizXlsx'])->name('quiz.xlsx');
        Route::get('/quiz-after/xlsx/{id}/{attendanceId}', [AttendanceController::class, 'QuizAfterXlsx'])->name('quiz.after.xlsx');
        Route::post('/courses-files', [CourseFileController::class, 'store']);
        Route::post('/courses-links', [CourseLinkController::class, 'store']);
        Route::resource('attendance', AttendanceController::class);
        Route::post('/attendance/upload-excel/{courseId}', [AttendanceController::class, 'upload'])->name('attendance.upload');
        Route::post('/update/certifcate', [CertificateController::class, 'updateCertifcate'])->name('updateCertifcate');
        Route::post('/attend', [AttendanceController::class, 'attendCourse'])->name('attend.course');
        Route::post('/delete-attend', [AttendanceController::class, 'deleteAttendCourse'])->name('delete.attend.course');
        Route::post('/deipIn-store/{id}', [QuizController::class, 'drepInStore'])->name('deipIn.store');
        Route::get('/search', [ClientController::class , 'search'])->name('search');
        Route::get('/search/admins', [AdminController::class , 'search'])->name('search.admins');
        Route::post('/admins-manger', [AdminController::class, 'adminManger'])->name('admin.manger');
        Route::get('/add-mangemt/{type}', [AdminController::class , 'addMangement'])->name('addMangement');
        Route::get('/quick-program',[ProgramController::class ,'programQuick'])->name('programQuick');
        Route::post('/check-user',[ProgramController::class ,'checkUser'])->name('check.user');

        Route::post('/quick-program/store',[ProgramController::class ,'programQuickStore'])->name('programQuickStore');

        // روت مؤقت
        Route::get('/quiz/detales', function () {
            return view('dashboard.quiz.detales');
        })->name('quiz_detales');
        Route::get('/AddProjectManager/{id}',[ProgramController::class ,'programWizard'])->name('AddProjectManager');
        Route::get('/AddProject', function () {
            return view('dashboard.AddProject.add');
        })->name('AddProject');
        Route::get('/AddProject2', function () {
            return view('dashboard.AddProject.add2');
        })->name('AddProject2');
        Route::post('/programWizardStore/{id}', [ProgramController::class, 'programWizardStore'])->name('programWizardStore.store');

        Route::get('/interactivse', function () {
            return view('dashboard.interactive');
        })->name('interactivse');

        Route::get('/AddProject3',[ClientController::class , 'createClient'])->name('AddProject3');

        Route::get('/AddTemplate', function () {
            return view('dashboard.AddTemplate.index');
        })->name('AddTemplate');


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
        Route::get('/', [PagesController::class, 'index'])->name('admin.dashboard');
        Route::resource('categories', CategoryController::class);
        Route::get('/get-cities/{id}', [CityController::class, 'getCities']);
        Route::resource('clients', ClientController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('trainers', TrainerController::class);
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);
        Route::resource('/role.permissions', RolePermissionController::class);
        Route::post('/candidate/course', [CandidateCourseController::class , 'store']);
        Route::get('/candidate/course/{id}', [CandidateCourseController::class, 'showCand'])->name('show.candidate');
        Route::get('/get-rates/{id}', [RateController::class, 'createRate'])->name('get.rate');
        Route::resource('rates', RateController::class);
        Route::get('/search/adminMangersel', [AdminController::class , 'adminMangersel'])->name('search.adminMangersel');
        Route::get('/search/admincord_select', [AdminController::class , 'admincordSelect'])->name('search.admincordSelect');
        Route::get('/program/manger/{id}', [ProgramController::class , 'mangers'])->name('program.mangers');
        Route::put('/program/manger/{id}', [ProgramController::class , 'mangersUpdate'])->name('program.mangers.update');
        Route::post('/addmangment', [AdminController::class, 'addMangment'])->name('addmangment');
        Route::post('/programWizardUpdate', [ProgramController::class, 'programWizardUpdate'])->name('programWizardUpdate');
        Route::get('/mangersProjects', [AdminController::class , 'mangersProjects'])->name('mangersProjects');
        Route::get('/cordreatorProjects', [AdminController::class , 'cordreatorProjects'])->name('cordreatorProjects');
        Route::get('/cordTrainnerProjects', [AdminController::class , 'cordTrainnerProjects'])->name('cordTrainnerProjects');
        Route::get('/consultantsProjects', [AdminController::class , 'consultantsProjects'])->name('consultantsProjects');
        Route::post('/updateMangment/{id}', [AdminController::class, 'updateMangment'])->name('updateMangment');
        Route::get('/edit-mangment/{id}', [AdminController::class , 'editMangment'])->name('mangment.edit');
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
Route::get('/rate/{id}/{course_id}', [SiteController::class, 'rate'])->name('rate.attend');
Route::post('/submitRating/{id}/{course_id}', [SiteController::class, 'submitRating'])->name('submitRating');

Route::prefix('/')->middleware('guest:attendance')->group(function () {
    Route::get('', [InvationController::class, 'login'])->name('invitationV2.login');
});
Route::get('/candidat', [InvationController::class, 'candidat'])->name('invitationV2.candidat')->middleware('auth:attendance');
Route::prefix('')->middleware('auth:attendance')->group(
    function () {
Route::get('/accept-v2/{id}/{course_id}', [InvationController::class, 'second'])->name('invitationV2.second');
Route::get('/invitation-v2/{id}/{course_id}', [InvationController::class, 'index'])->name('invitationV2.index');
Route::post('/invitation-v2/reply', [InvationController::class, 'storeReply']);
Route::get('/files-v2/{id}/{course_id}', [InvationController::class, 'files'])->name('invitationV2.files');
Route::get('/inviation-v2/{id}/{course_id}', [InvationController::class, 'inviation'])->name('invitationV2.inviation');
Route::get('/exams-v2/{id}/{course_id}', [InvationController::class, 'third'])->name('invitationV2.third');
Route::get('/courses', [InvationController::class, 'courses'])->name('invitationV2.courses');
}
);

Route::get('/home/{id}/{course_id}', [InvationController::class, 'redirectToLogin'])->name('redirectToLogin');
Route::post('/send-sms', [InvationController::class, 'sendSms'])->name('sendSms');
Route::post('/send-otp', [InvationController::class, 'submitOtp'])->name('submitOtp');

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


Route::get('/inv4Mohammed', [SiteController::class, 'quizView']);


Route::get('/inv4Mohammed', function () {
    return view('invitationV2.accept_invivation');
})->name('inv4Mohammed');

Route::get('/inv4Mohammed2', function () {
    return view('invitationV2.invition');
})->name('inv6Mohammed');
