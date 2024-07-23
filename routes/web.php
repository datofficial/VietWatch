<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\MaterialStrapController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\DetailWatchController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

// Route cho trang admin
Route::resource('categories', CategoryController::class);
Route::resource('manufacturers', ManufacturerController::class);
Route::resource('payment_methods', PaymentMethodController::class);
Route::resource('cities', CityController::class);
Route::resource('districts', DistrictController::class);
Route::resource('wards', WardController::class);
Route::resource('material_straps', MaterialStrapController::class);
Route::resource('colors', ColorController::class);
Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::resource('watches', WatchController::class);
Route::resource('detail_watches', DetailWatchController::class);
Route::resource('detail_orders', DetailOrderController::class);

// Routes cho AJAX 
Route::get('/getCities', [CityController::class, 'getCities']);
Route::get('/getDistricts/{city_id}', [DistrictController::class, 'getDistrictsByCity']);
Route::get('/getWards/{district_id}', [WardController::class, 'getWardsByDistrict']);

// Route cho trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');

Route::get('/detailwatch/{id}', [HomeController::class, 'detailwatch'])->name('home.detailwatch');

Route::get('/homeCategories', [HomeController::class, 'allCategories'])->name('home.allCategories');
Route::get('/homeCategory/{id}', [HomeController::class, 'category'])->name('home.category');

Route::get('/homeManufacturers', [HomeController::class, 'allManufacturers'])->name('home.allManufacturers');
Route::get('/homeManufacturer/{id}', [HomeController::class, 'manufacturer'])->name('home.manufacturer');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact/send', [HomeController::class, 'sendContact'])->name('contact.send');

Route::get('/profile', [HomeController::class, 'profile'])->name('home.profile');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');

Route::get('/login', [UserController::class, 'loginCustomer'])->name('home.loginCustomer');
Route::get('/login_process', [UserController::class, 'loginCustomer_process'])->name('home.loginProcess');

Route::get('/register', [UserController::class, 'registerCustomer'])->name('home.registerCustomer');
Route::get('/register_process', [UserController::class, 'register_process'])->name('home.registerProcess');