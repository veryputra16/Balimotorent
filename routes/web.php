<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\viewUser\UserController as AdminviewUserUserController;
use App\Http\Controllers\Admin\viewAdmin\AdminController as AdminviewAdminAdminController;
use App\Http\Controllers\Admin\viewMotor\MotorController as AdminviewMotorMotorController;
use App\Http\Controllers\Admin\viewMotor\RentedMotorcycle as AdminviewMotorRentedController;
use App\Http\Controllers\Admin\AdminAuthController as AdminLoginController;;

// use App\Http\Controllers\Admin\viewLoan\LoanController as AdminviewLoanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HowToRentController;
use App\Http\Controllers\Frontpage;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\DashboardProfileController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Help;
use Illuminate\Support\Facades\Auth;
use App\Http\Kernel;
use App\Models\User;


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

// ROUTE FRONT PAGE
Route::get('/', [HomeController::class, 'index']);
Route::get('/how-to-rent', [HowToRentController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);

// ROUTE BOOKING-BIKE
Route::get('/rent/{motor:name}', [RentController::class, 'detail']);
Route::get('/rent', [RentController::class, 'index']);
Route::post('/rent', [RentController::class, 'booking']);


//ROUTE ABOUT PAGE
Route::get('/about', [AboutController::class, 'index']);
Route::get('/profile/{admin:name}', [AboutController::class, 'profile']);

//our customer review
// Route::get('/', [App\Http\Controllers\ReviewController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::post('/logout', [LogoutController::class, 'logout'])->name("");
});

//USER ACCESS
Route::get('/user/{user:username}/dashboard', [UserDashboardController::class, 'index'])->middleware('auth');
Route::delete('/user/{user:username}/dashboard/{loan}', [UserDashboardController::class, 'destroy'])->middleware('auth');

Route::resource('/user', DashboardProfileController::class)->middleware('auth');

// Route::middleware('guest')->group(function(){
//     // ROUTE LOGIN & REGISTER
//     Route::get('/signin', [LoginController::class, 'index'])->name('signin');
//     Route::post('/signin', [LoginController::class, 'authenticate']);
    
//     //ROUTE LOGIN & REGISTER
//     Route::get('/signup', [LoginController::class, 'register'])->name('signup');
//     Route::post('/signup', [LoginController::class, 'register_post']);
// });

Route::middleware('guest')->group(function(){
    Route::get('/signin', [LoginController::class, 'index'])->name('signin');
    Route::post('/signin', [LoginController::class, 'authenticate']);
    Route::post('/signup', [LoginController::class, 'register_post']);
});


// ROUTE ADMIN 
// Route::get('/admin/home', [AdminDashboardController::class, 'Hal_Admin']);
Route::get('/admin/home', [AdminDashboardController::class, 'Hal_Admin'])->name('admin.dashboard');
Route::resource('/admin/user', AdminviewUserUserController::class);
Route::resource('/admin/admin', AdminviewAdminAdminController::class);
Route::resource('/admin/motor', AdminviewMotorMotorController::class);
Route::get('/admin/motors/rented', [AdminviewMotorRentedController::class,'index']);
Route::get('/admin/admin-login', [AdminLoginController::class, 'Hal_Admin_login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route CONVERT PDF
// Route::get('/admin/motors/rented/pdf', [AdminviewMotorRentedController::class, 'generatePDF']);
Route::get('/admin/motors/rented/pdf', [AdminviewMotorRentedController::class, 'generatePDF'])->name('admin.motors.rented.pdf');
