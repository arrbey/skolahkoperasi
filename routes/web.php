<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Public\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageController::class)->name('home');
Route::get('/tentang', LandingPageController::class)->name('about');
Route::redirect('/kontak', '/#contact')->name('contact');
Route::redirect('/brosur', '/#brochures')->name('brochures');
Route::redirect('/login', '/admin/login')->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    });

    Route::middleware('admin')->group(function () {
        Route::redirect('/', '/admin/dashboard')->name('home');
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/password', [AuthController::class, 'showChangePassword'])->name('password.edit');
        Route::put('/password', [AuthController::class, 'updatePassword'])->name('password.update');

        Route::get('/hero', [ContentController::class, 'hero'])->name('hero.edit');
        Route::put('/hero', [ContentController::class, 'updateHero'])->name('hero.update');
        Route::get('/visi-misi', [ContentController::class, 'vision'])->name('vision.edit');
        Route::put('/visi-misi', [ContentController::class, 'updateVision'])->name('vision.update');
        Route::get('/keunggulan', [ContentController::class, 'benefits'])->name('benefits.index');
        Route::post('/keunggulan', [ContentController::class, 'storeBenefit'])->name('benefits.store');
        Route::put('/keunggulan/{benefit}', [ContentController::class, 'updateBenefit'])->name('benefits.update');
        Route::delete('/keunggulan/{benefit}', [ContentController::class, 'destroyBenefit'])->name('benefits.destroy');
        Route::get('/brosur', [ContentController::class, 'brochures'])->name('brochures.index');
        Route::post('/brosur', [ContentController::class, 'storeBrochure'])->name('brochures.store');
        Route::put('/brosur/{brochure}', [ContentController::class, 'updateBrochure'])->name('brochures.update');
        Route::delete('/brosur/{brochure}', [ContentController::class, 'destroyBrochure'])->name('brochures.destroy');
        Route::get('/qna', [ContentController::class, 'qnas'])->name('qnas.index');
        Route::put('/qna/gambar', [ContentController::class, 'updateQnaImage'])->name('qna-image.update');
        Route::post('/qna', [ContentController::class, 'storeQna'])->name('qnas.store');
        Route::put('/qna/{qna}', [ContentController::class, 'updateQna'])->name('qnas.update');
        Route::delete('/qna/{qna}', [ContentController::class, 'destroyQna'])->name('qnas.destroy');
        Route::get('/kontak', [ContentController::class, 'contact'])->name('contact.edit');
        Route::put('/kontak', [ContentController::class, 'updateContact'])->name('contact.update');
        Route::get('/pengaturan', [ContentController::class, 'settings'])->name('settings.edit');
        Route::put('/pengaturan', [ContentController::class, 'updateSettings'])->name('settings.update');
    });
});
