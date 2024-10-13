<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\AnalyzeDashboardController;

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

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/logout', [AnalyzeController::class, 'logout'])->name('logout');
    Route::get('/payment', [AnalyzeController::class, 'paymentAndBilling'])->name('payment');
    Route::get('/dashboard-core', [AnalyzeController::class, 'mainDashboard'])->name('dashboard-core');
    Route::get('/setting', [AnalyzeController::class, 'setting'])->name('setting');
    Route::get('/profile-user', [AnalyzeController::class, 'profileUser'])->name('profile-user');
    Route::put('/profile-user', [AnalyzeController::class, 'updateProfile'])->name('updateProfile');

});
Route::get('/home-sig', [AnalyzeController::class, 'index'])->name('index');
Route::get('/signin', [AnalyzeController::class, 'signin'])->name('signin');
Route::post('/signin', [AnalyzeController::class, 'login'])->name('signin');
Route::get('/signup', [AnalyzeController::class, 'signup'])->name('signup');
Route::post('/signup', [AnalyzeController::class, 'register'])->name('register');

Route::post('/email/verification-notification', [AnalyzeController::class, 'resendVerificationEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
Route::get('/email/verify', [AnalyzeController::class, 'verifyEmail'])->name('verification.notice');
Route::get('/email/verifyMail/{id}/{hash}', [AnalyzeController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::get('/email/verified', [AnalyzeController::class, 'emailVerified'])->name('email.verified');

Route::get('/forgot-password', [AnalyzeController::class, 'forgotPassword'])->name('password.request');
Route::post('/forgot-password', [AnalyzeController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AnalyzeController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AnalyzeController::class, 'resetPassword'])->name('password.update');

Route::prefix('admin_analyze')->group(function () {
    Route::get('index', [AnalyzeDashboardController::class, 'index'])->name('admin_analyze.emiten.dashboard');
    Route::get('create', [AnalyzeDashboardController::class, 'create'])->name('admin_analyze.emiten.create');
    Route::post('store', [AnalyzeDashboardController::class, 'store'])->name('admin_analyze.emiten.store');
    Route::get('{id}/edit', [AnalyzeDashboardController::class, 'edit'])->name('admin_analyze.emiten.edit');
    Route::put('{id}', [AnalyzeDashboardController::class, 'update'])->name('admin_analyze.emiten.update');
    Route::delete('{id}', [AnalyzeDashboardController::class, 'destroy'])->name('admin_analyze.emiten.destroy');

    Route::get('user/index', [AnalyzeDashboardController::class, 'showUsers'])->name('admin_analyze.user.index');

    Route::get('{companyId}/key_statistics/{id}/edit', [AnalyzeDashboardController::class, 'edit_key_statistics'])->name('admin_analyze.key_statistics.edit');
    Route::put('{companyId}/key_statistics/update', [AnalyzeDashboardController::class, 'update_key_statistics'])->name('admin_analyze.key_statistics.update');
    Route::get('{companyId}/key_ratio/{id}/edit', [AnalyzeDashboardController::class, 'edit_key_ratio'])->name('admin_analyze.key_ratio.edit');
    Route::put('{companyId}/key_ratio/update', [AnalyzeDashboardController::class, 'update_key_ratio'])->name('admin_analyze.key_ratio.update');
    Route::post('/years', [AnalyzeDashboardController::class, 'storeYear'])->name('years.store');

    Route::get('/settings', [AnalyzeDashboardController::class, 'index_setting'])->name('admin_analyze.setting.index');
    Route::post('/settings', [AnalyzeDashboardController::class, 'store_setting'])->name('admin_analyze.setting.store');
    Route::put('/settings/{id}', [AnalyzeDashboardController::class, 'update_setting'])->name('admin_analyze.setting.update');
    Route::delete('/settings/{id}', [AnalyzeDashboardController::class, 'destroy_setting'])->name('admin_analyze.setting.destroy');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'aboutus'])->name('about');
Route::get('/landingpage', [HomeController::class, 'landing'])->name('landing');
Route::get('/SpecialClassSIG', [HomeController::class, 'landing2'])->name('specialclass');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/daftaruser', [UserController::class, 'index'])->name('back');
    Route::post('/product/add_cart/{id}', [ProductController::class, 'add_cart'])->name('add_cart');
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::post('/detail', [ProductController::class, 'detail'])->name('detail');
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout/invoice/{id}', [CheckoutController::class, 'invoice'])->name('invoice');
    Route::get('/siginstitute', [ProductController::class, 'index'])->name('siginstitute');
    Route::get('/my-order', [OrderController::class, 'myorder'])->name('myorder');
    // routes/web.php
    Route::delete('/cart/remove', [ProductController::class, 'remove'])->name('remove');
    Route::post('cart/applypromo', [ProductController::class, 'ApplyPromo'])->name('promo');
    //route admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/akun', [AdminController::class, 'akun'])->name('akun');
    Route::get('/admin/order', [AdminController::class, 'order'])->name('order');
    Route::get('/admin/product', [AdminController::class, 'adminproduct'])->name('adminproduct');
    Route::get('/admin/product/create', [AdminController::class, 'createproduct'])->name('createproduct');
    Route::post('/admin/product/create/store', [AdminController::class, 'storeproduct'])->name('storeproduct');
    Route::get('/admin/product/edit/{id}', [AdminController::class, 'editproduct'])->name('editproduct');
    Route::put('/admin/product/edit/update/{id}', [AdminController::class, 'updateproduct'])->name('updateproduct');
    Route::delete('/admin/product/delete/{id}', [AdminController::class, 'destroy'])->name('deleteProduct');
    Route::get('/admin/voucher', [AdminController::class, 'voucher'])->name('voucher');
    Route::get('/admin/voucher/create', [AdminController::class, 'createvoucher'])->name('createvoucher');
    Route::post('/admin/voucher/create/store', [AdminController::class, 'storevoucher'])->name('storevoucher');
    Route::get('/admin/voucher/edit/{id}', [AdminController::class, 'editvoucher'])->name('editvoucher');
    Route::put('/admin/voucher/edit/update/{id}', [AdminController::class, 'updatevoucher'])->name('updatevoucher');
    Route::delete('/admin/voucher/delete/{id}', [AdminController::class, 'destroyVoucher'])->name('destroyVoucher');
});