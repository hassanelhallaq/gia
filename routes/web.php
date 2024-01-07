<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceCourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TrainerController;
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
Route::prefix('dashboard/admin')->middleware('auth:admin,client')->group(
    function () {
        Route::get('/', [PagesController::class, 'index'])->name('admin.dashboard');
        Route::resource('courses', CourseController::class);
        Route::get('/program.courses/{id}', [CourseController::class, 'programCourses'])->name('program.course');
        Route::get('/program.courses/{id}/create', [CourseController::class, 'createCourse'])->name('program.course.create');
        Route::get('/get-courses/{id}', [CourseController::class, 'getCoureses']);
        Route::resource('questions', QuestionController::class);
        Route::resource('attendance', AttendanceController::class);
        Route::resource('programs', ProgramController::class);
        Route::get('/programs-grid', [ProgramController::class, 'gridView'])->name('programs.grid');
        Route::get('/courses.attendances/{id}', [AttendanceCourseController::class, 'coursesAttendance'])->name('course.attendance');
        Route::get('/quiz.questions/{id}', [QuizController::class, 'question'])->name('quiz.questions');
        Route::resource('quizes', QuizController::class);

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
    }
);
Route::get('/invitation/{id}/{course_id}', [SiteController::class, 'index'])->name('invitation.index');
Route::get('/accept/{id}/{course_id}', [SiteController::class, 'second'])->name('invitation.second');
Route::get('/third/{id}/{course_id}', [SiteController::class, 'third'])->name('invitation.third');

Route::post('/invitation/reply', [SiteController::class, 'storeReply']);
Route::prefix('/{username}')->group(
    function () {
        Route::get('/home', [LandingPageController::class, 'home'])->name('home');
        Route::get('/time-line', [LandingPageController::class, 'timeLine'])->name('timeLine');
        Route::get('/get-events', [LandingPageController::class, 'getEvent'])->name('get.events');
    }
);
