<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminController;

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

//Basic Pages
Route::get('/', [pageController::class,'home'])->name('home');
Route::get('/services', [pageController::class,'services'])->name('services');
Route::get('/about', [pageController::class,'about'])->name('about');
Route::get('/departments', [pageController::class,'department'])->name('departments');
Route::get('/contact', [pageController::class,'contact'])->name('contact');
Route::post('/info',[pageController::class,'contactSubmitted'])->name('contactSubmitted');

//Seller Pages
Route::get('/register', [SellerController::class,'register'])->name('register');
Route::post('/regInfo',[SellerController::class,'create'])->name('registerSubmit');
Route::get('/login', [SellerController::class,'login'])->name('login');
Route::post('/login',[SellerController::class,'loginRequest'])->name('login');
Route::get('/dashboard', [SellerController::class,'dashboard'])->name('dashboard')->middleware('ValidSeller');
Route::get('/logout',[SellerController::class,'logout'])->name('logout')->middleware('ValidSeller');
Route::get('/profile',[SellerController::class,'loadProfile'])->name('profile')->middleware('ValidSeller');
Route::get('/edit',[SellerController::class,'editProfile'])->name('edit_profile')->middleware('ValidSeller');
Route::post('/update',[SellerController::class,'updateProfile'])->name('updateProfile')->middleware('ValidSeller');

//Admin Pages
Route::get('/adminLogin',[AdminController::class,'index'])->name('admin_log');
Route::post('/adminLogin',[AdminController::class,'adminlogin'])->name('admin_login');
Route::get('/admin_dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard')->middleware('ValidAdmin');
Route::get('/admin_logout',[AdminController::class,'logout'])->name('admin_logout')->middleware('ValidAdmin');
Route::get('/create_seller',[AdminController::class,'seller_reg'])->name('create_seller')->middleware('ValidAdmin');
Route::post('/adminRegInfo',[AdminController::class,'create'])->name('add_seller')->middleware('ValidAdmin');
Route::get('/manage_sellers',[AdminController::class,'showUsers'])->name('manage_sellers')->middleware('ValidAdmin');
Route::get('/d-{id}',[AdminController::class,'showUser'])->name('show_seller')->middleware('ValidAdmin');
Route::get('/dE-{id}',[AdminController::class,'editUser'])->name('edit_seller')->middleware('ValidAdmin');
Route::get('/dD-{id}',[AdminController::class,'deleteUser'])->name('delete_seller')->middleware('ValidAdmin');
Route::post('/up',[AdminController::class,'updateProfile'])->name('upProfile')->middleware('ValidAdmin');




