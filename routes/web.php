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

Route::get('admin/login', [UserController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('admin/login', [UserController::class, 'adminLogin'])->name('admin.loginProcess');
Route::post('admin/logout', [UserController::class, 'adminLogout'])->name('admin.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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
Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('home.addToCart');
Route::post('/cart/update/{id}', [HomeController::class, 'updateCart'])->name('home.updateCart');
Route::post('/cart/remove/{id}', [HomeController::class, 'removeFromCart'])->name('home.removeFromCart');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');
Route::post('/checkout/process', [HomeController::class, 'processCheckout'])->name('checkout.process');

Route::get('/homeOrders', [HomeController::class, 'userOrders'])->name('home.orders');
Route::get('/homeOrders/{id}', [HomeController::class, 'orderDetail'])->name('home.orderDetail');
// Route::get('/orders/{id}', [HomeController::class, 'orderDetail'])->name('home.orderDetail');
Route::post('/orders/{id}/cancel', [HomeController::class, 'cancelOrder'])->name('home.cancelOrder');
Route::post('/checkout/process', [HomeController::class, 'placeOrder'])->name('checkout.process');

Route::get('/detailwatch/{id}', [HomeController::class, 'detailwatch'])->name('home.detailwatch');

Route::get('/homeCategories', [HomeController::class, 'allCategories'])->name('home.allCategories');
Route::get('/homeCategory/{id}', [HomeController::class, 'category'])->name('home.category');

Route::get('/homeManufacturers', [HomeController::class, 'allManufacturers'])->name('home.allManufacturers');
Route::get('/homeManufacturer/{id}', [HomeController::class, 'manufacturer'])->name('home.manufacturer');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact/send', [HomeController::class, 'sendContact'])->name('contact.send');

Route::get('/profile', [HomeController::class, 'profile'])->name('home.profile');
Route::get('/profile/edit', [HomeController::class, 'editProfile'])->name('home.profile.edit');
Route::post('/profile/edit', [HomeController::class, 'updateProfile'])->name('home.profile.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');

Route::get('/login', [UserController::class, 'loginCustomer'])->name('home.loginCustomer');
Route::get('/login_process', [UserController::class, 'loginCustomer_process'])->name('home.loginProcess');

Route::get('/register', [UserController::class, 'registerCustomer'])->name('home.registerCustomer');
Route::post('/register_process', [UserController::class, 'register_process'])->name('home.registerProcess');