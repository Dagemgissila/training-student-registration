<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboaordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymnetController;
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



Route::get('/login',[LoginController::class,"index"])->middleware('guest');
Route::get("terms-and-conditions", function () {
    return view('terms-and-policies');
})->middleware("guest");
Route::get("complete-registration", function () {
    return view('thankYou');
})->name("complete-registration")->middleware("guest");
Route::post("/login",[LoginController::class,"check"])->name("login");
Route::get("/register",[RegisterController::class,"index"])->name("register")->middleware('guest');
Route::post("/register",[RegisterController::class,"store"])->name("StudentRegisiter");
Route::get("student-register",[RegisterController::class,"registerForm"])->name("adminStudentRe")->middleware('auth');
Route::get("student/add-paymnent/{id}",[PaymnetController::class,"index"])->name("admin.addPayment")->middleware('auth');
Route::post("approved-payment",[PaymnetController::class,"addPayment"])->name("admin.approvedPayment")->middleware('auth');
Route::get("payment/payment-history/{id}",[PaymnetController::class,"viewPaymentHistory"])->name("admin.paymentHistory")->middleware("auth");
Route::get("edit-payment/{id}",[PaymnetController::class,"edit"])->name("admin.editPayment")->middleware("auth");
Route::post("update-paymenet/{id}",[PaymnetController::class,"update"])->name("admin.updatePayment")->middleware("auth");
Route::get("/dashboard",[DashboaordController::class,"index"])->name("dashboard")->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get("/student",[StudentController::class,"index"])->name("student")->middleware('auth');
Route::get("student-detail/{id}",[RegisterController::class,"viewDeatil"])->name("admin.viewDetail")->middleware('auth');
Route::get("all-payment-history",[PaymnetController::class,"allPaymentHistory"])->name("allPaymentHistory");
Route::post("update-student-profile/{id}",[RegisterController::class,"updateProfile"])->name("updateStudentProfile");
