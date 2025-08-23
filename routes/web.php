<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\LocationSettingController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboardController;
use App\Http\Controllers\Teacher\ScheduleController as TeacherScheduleController;
use App\Http\Controllers\Teacher\AttendanceController as TeacherAttendanceController;
use App\Http\Controllers\Principal\DashboardController as PrincipalDashboardController;
use App\Http\Controllers\Principal\ReportController as PrincipalReportController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('school-classes', SchoolClassController::class);
        Route::resource('schedules', AdminScheduleController::class);
        Route::get('settings/location', [LocationSettingController::class, 'index'])->name('settings.location');
        Route::post('settings/location', [LocationSettingController::class, 'store'])->name('settings.location.store');
        Route::get('reports', [AdminReportController::class, 'index'])->name('reports.index');
    });

    // Teacher Routes
    Route::middleware(['role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
        Route::get('dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
        Route::get('schedule', [TeacherScheduleController::class, 'index'])->name('schedule.index');
        Route::get('attendance/create/{schedule}', [TeacherAttendanceController::class, 'create'])->name('attendance.create');
        Route::post('attendance', [TeacherAttendanceController::class, 'store'])->name('attendance.store');
        Route::get('attendance/history', [TeacherAttendanceController::class, 'history'])->name('attendance.history');
    });

    // Principal Routes
    Route::middleware(['role:principal'])->prefix('principal')->name('principal.')->group(function () {
        Route::get('dashboard', [PrincipalDashboardController::class, 'index'])->name('dashboard');
        Route::get('reports', [PrincipalReportController::class, 'index'])->name('reports.index');
        Route::get('reports/download', [PrincipalReportController::class, 'download'])->name('reports.download');
        Route::get('reports/users/{user}/download-pdf', [PrincipalReportController::class, 'downloadPdfByUser'])->name('reports.download.pdf');
    });

});