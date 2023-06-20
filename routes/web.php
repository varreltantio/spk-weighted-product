<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class)->except(['show']);
    Route::resource('criterias', CriteriaController::class)->except(['show']);
    Route::resource('assessments', AssessmentController::class)->except(['show']);
    Route::get('/assessments/best-employee', [AssessmentController::class, 'bestEmployee'])->name('assessments.bestEmployee');
});
