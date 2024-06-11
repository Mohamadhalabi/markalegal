<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SitemapXmlController;

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
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'Login'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard.home');
    Route::resource('guide', GuideController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('price', PriceController::class);
    Route::resource('order',OrderController::class);
});
Route::get('/search', [GuideController::class,'liveSearch']);
Route::get('/nice-class',[GuideController::class,'nice_class']);

Route::get('/guides', [HomeController::class, 'guides']);
Route::get('/marka-patent-rehberi', [HomeController::class, 'markaPatentRehberi'])->name('marka-patent-rehberi');
Route::get('/marka-patent-rehberi/{slug}', [HomeController::class, 'guide'])->name('guide');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/marka-basvurusu-talebi/{markaName?}/{sinifCount?}', [HomeController::class, 'online'])->where('sinifCount','[0-9]+')->name('online');
Route::prefix('/kurumsal')->group(function () {
    Route::get('/hakkimizda', [HomeController::class, 'hakkimizda'])->name('hakkimizda');
    Route::get('/gizlilik-politikasi', [HomeController::class, 'gizlilikPolitikasi'])->name('gizlilik-politikasi');
    Route::get('/kvkk-aydinlatma-metni', [HomeController::class, 'kvkkAydinlatmaMetni'])->name('kvkk-aydinlatma-metni');
    Route::get('/bilgi-guvenligi-politikasi', [HomeController::class, 'bilgiGuvenligiPolitikasi'])->name('bilgi-guvenligi-politikasi');
    Route::get('/mesafeli-satis-sozlesmesi', [HomeController::class, 'mesafeliSatisSozlesmesi'])->name('mesafeli-satis-sozlesmesi');
    Route::get('/teslimat-ve-iade-politikasi', [HomeController::class, 'teslimatVeIadePolitikasi'])->name('teslimat-ve-iade-politikasi');
});

Route::post('/contact/store', [ContactController::class, 'store']);
Route::get('/ucret-modeli', [HomeController::class, 'list']);
Route::post('/payment',[PaymentController::class,'store']);
Route::get('/pay',[PaymentController::class,'index'])->name('pay');
Route::post('/iyzico-callback',[PaymentController::class,'callback'])->name('iyzico.callback');
Route::get('/iyzico-success',[PaymentController::class,'success'])->name('iyzico.success');
Route::get('/iyzico-failed',[PaymentController::class,'failed'])->name('iyzico.failed');

