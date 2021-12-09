<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\Auth\PatientLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\DoctorRegisterController;
use App\Http\Controllers\Auth\PatientRegisterController;
use App\Http\Controllers\Auth\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* New Email Routes */
// Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth:patient', 'is_verify_email']); 
Route::get('/user/verify/{token}', [PatientRegisterController::class, 'verifyEmail'])->name('user.verify'); 

// Admin
Route::get('admin/authentication/login', [AdminLoginController::class, 'showAdminLoginForm']);
Route::post('admin/authentication/login', [AdminLoginController::class,'adminLogin']);
Route::get('admin/add/admin', [AdminRegisterController::class,'showAdminAddForm'])->name('admin.add');
Route::post('admin/add/admin', [AdminRegisterController::class,'createAdmin'])->name('admin.add');

// Error
Route::get('error/page', [AdminController::class,'errorpage']);

// Doctor
Route::get('doctor/authentication/login', [DoctorLoginController::class, 'showDoctorLoginForm'])->name('doctor_login');
Route::get('admin/add/doctor', [DoctorRegisterController::class,'showDoctorAddForm'])->name('doctor.add');
Route::post('admin/add/doctor', [DoctorRegisterController::class,'createDoctor'])->name('doctor.add');

// Patient
Route::get('authentication/login', [PatientLoginController::class, 'showPatientLoginForm'])->name('user_login');
Route::post('authentication/login', [PatientLoginController::class, 'patientLogin'])->name('user_login');
Route::get('authentication/register', [PatientRegisterController::class,'showPatientRegisterForm'])->name('user_register');
Route::post('authentication/register', [PatientRegisterController::class,'createPatient'])->name('user_register');

Route::group(['middleware' => 'auth:admin'], function () {   
    // View Pages
    Route::view('/admin', 'admin.dashboard');
    Route::get('admin/dashboard', [AdminController::class,'dashboardpage']);
    Route::get('admin/map', [AdminController::class,'mappage']);
    Route::get('admin/maps', [AdminController::class,'mapspage']);
    // Clinic
    Route::get('admin/clinic/page', [ClinicController::class,'showClinicPage'])->name('clinicPage');
    Route::get('admin/clinic/add', [ClinicController::class,'indexclinic'])->name('addClinic');
    Route::post('admin/clinic/add', [ClinicController::class,'store'])->name('addClinic');
    Route::get('admin/clinic/delete/{id}', [ClinicController::class,'deleteClinicRecord'])->name('deleteClinicRecord');
    Route::get('admin/clinic/edit/{id}', [ClinicController::class,'editClinicRecord'])->name('editClinicRecord');
    Route::post('admin/clinic/edit', [ClinicController::class,'updateClinicRecord'])->name('updateClinicRecord');
    // Doctor
    Route::get('admin/doctor/page', [DoctorController::class,'showDoctorPage'])->name('doctorPage');
    Route::get('admin/doctor/delete/{id}', [DoctorController::class,'deleteDoctorRecord'])->name('deleteDoctorRecord');
    Route::get('admin/doctor/edit/{id}', [DoctorController::class,'editDoctorRecord'])->name('editDoctorRecord');
    Route::post('admin/doctor/edit', [DoctorController::class,'updateDoctorRecord'])->name('updateDoctorRecord');
    // Admin(loggedin)
    Route::get('admin/profile', [AdminController::class,'profilepage']);
    // Admin
    Route::get('admin/page', [AdminController::class,'showAdminPage'])->name('adminPage');
    Route::get('admin/delete/{id}', [AdminController::class,'deleteAdminRecord'])->name('deleteAdminRecord');
    Route::get('admin/edit/{id}', [AdminController::class,'editAdminRecord'])->name('editAdminRecord');
    Route::post('admin/edit', [AdminController::class,'updateAdminRecord'])->name('updateAdminRecord');
    // Patient
    Route::get('admin/patient/page', [PatientController::class,'showPatientPage'])->name('patientPage');
    Route::get('admin/patient/delete/{id}', [PatientController::class,'deletePatientRecord'])->name('deletePatientRecord');
    Route::get('admin/patient/edit/{id}', [PatientController::class,'editPatientRecord'])->name('editPatientRecord');
    Route::post('admin/patient/edit', [PatientController::class,'updatePatientRecord'])->name('updatePatientRecord');   
});

Route::group(['middleware' => 'auth:patient'], function () {
});
Route::get('/homepage', [PatientController::class,'patientHomepage']);

Route::group(['middleware' => 'auth:doctor'], function () {
});

// Logout
Route::get('logout', [LogoutController::class,'logout'])->name('logout');

Auth::routes();

// Index Page
Route::get('/',[IndexController::class,'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/',[IndexController::class,'index'])->name('home');




