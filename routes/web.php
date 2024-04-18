<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;

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

// client-side
Route::get('/', [AdmissionController::class, 'admission_form']);

Route::post('/submit_admission', [AdmissionController::class, 'submit_admission'])->name('submit_admission');

Route::get('/admission_status', [AdmissionController::class, 'admission_status']);

Route::post('/check-status', [AdmissionController::class, 'checkAdmissionStatus'])->name('check.status');

//admin side
Route::get('/admin_panel', [AdminController::class, 'showSubmittedForms'])->name('submitted.forms');

Route::post('/admit_students', [AdminController::class, 'admitStudents'])->name('admit_students');
Route::get('/free_bus_fare_charge/{id}', [AdminController::class, 'checkFreeBusFare']);
