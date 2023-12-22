<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceCourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProgramController;
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
Route::prefix('dashboard/admin')->middleware('auth:admin')->group(
    function () {
        Route::get('logout', [App\Http\Controllers\UserAuthController::class, 'logout'])->name('dashboard.auth.logout');
        Route::get('/', [PagesController::class , 'index'])->name('admin.dashboard');
        Route::resource('programs', ProgramController::class);
        Route::get('/programs-grid', [ProgramController::class , 'gridView'])->name('programs.grid');
        Route::resource('categories', CategoryController::class);
        Route::get('/get-cities/{id}', [CityController::class , 'getCities']);
        Route::resource('clients', ClientController::class);
        Route::resource('courses', CourseController::class);
        Route::get('/program.courses/{id}', [CourseController::class , 'programCourses'])->name('program.course');
        Route::get('/courses.attendances/{id}', [AttendanceCourseController::class , 'coursesAttendance'])->name('course.attendance');
        Route::resource('attendance', AttendanceController::class);

});
