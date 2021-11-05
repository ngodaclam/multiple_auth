<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryNewsController;
use App\Http\Controllers\NewsController;

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
Route::get('/', function () {
    return view('global');
});
Route::get('home', [HomeController::class, 'home'])->name('home');
// Authentication Routes...
Route::get('partner/login', [LoginController::class, 'showLoginForm'])->name('partner.login');
Route::get('admin_4j1t6j0', [LoginController::class, 'showLoginAdminForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::view('/confirm/register', 'auth.confirm')->name('confirm.register');
//confirm otp
Route::post('/confirm/register', [RegisterController::class, 'confirmOtp'])->name('confirm.register');
//view success register
Route::view('/confirm/register-ctv', 'auth.confirm')->name('register.ctv.confirm');
//Verify register
Route::post('register-verify', [RegisterController::class, 'verify'])->name('register.verify');
// check duplicate email-ctv
Route::post('check-email-ctv', [RegisterController::class, 'checkEmailCtv'])->name('check.emailCtv');

/* Route Partners */
Route::resource('partners', PartnerController::class)->except(['show', 'destroy']);
Route::group(['prefix' => 'partners'], function () {
    Route::get('', [PartnerController::class, 'table'])->name('table');
    Route::get('list', [PartnerController::class, 'listPartner'])->name('list-partner');
    Route::get('get-list', [PartnerController::class, 'getList'])->name('partner.list');
    Route::get('{id}/delete', [PartnerController::class, 'destroy'])->name('partners.destroy');
});

/* Route Orders */

Route::resource('orders', OrderController::class)->except(['show', 'destroy']);
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', [OrderController::class, 'orderMenu'])->name('order');
    Route::get('list', [OrderController::class, 'listOrder'])->name('list-order');
    Route::get('get-list', [OrderController::class, 'getList'])->name('order.list');
    Route::get('{id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');
});


/**
 * Category New Tables
 */

/* Route Tables */
Route::group(['prefix' => 'category-new'], function () {
    Route::get('list', [CategoryNewsController::class, 'listCateNew'])->name('list.cate.new');
    Route::post('save/category-new', [CategoryNewsController::class, 'store'])->name('category.new.store');
    Route::get('{id}/edit', [CategoryNewsController::class, 'edit'])->name('category.new.edit');
    Route::post('{id}/update', [CategoryNewsController::class, 'update'])->name('newsCategory.update');
    Route::get('{id}/delete', [CategoryNewsController::class, 'delete'])->name('newCategory.delete');
});
Route::get('list-cate-new', [CategoryNewsController::class, 'cateList'])->name('cate.list');

/* News tables */

Route::group(['prefix' => 'news'], function () {
    Route::get('list', [NewsController::class, 'index'])->name('list.news');
    Route::get('add', [NewsController::class, 'create'])->name('news.create');
    Route::post('save/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('{id}/update', [NewsController::class, 'update'])->name('news.update');
    Route::get('{id}/delete', [NewsController::class, 'destroy'])->name('news.delete');
});
Route::get('list-news', [NewsController::class, 'getList'])->name('get.list');

/* End News tables */
//Check duplicate name
Route::post('check-name-category', [CategoryNewsController::class, 'checkName'])->name('check.CategoryNews');
//Register Subscribers
Route::post('register-subscriber', [SubscriberController::class, 'register'])->name('subscriber.register');
// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

//check otp
Route::post('check-otp-ctv', [RegisterController::class, 'checkOtp'])->name('check.otp');

/**
 * About
 */
Route::get('about', [HomeController::class, 'about'])->name('about');

//News
Route::get('news', [HomeController::class, 'news'])->name('news');

//News Category

Route::get('/{id}/news',[HomeController::class,'newsCate'])->name('news.cate');
/**
 * Detail news
 */
Route::get('{id}/detail',[HomeController::class,'detail'])->name('detail');

/**
 * Search keyword subpage
 */

Route::get('search/keyword',[HomeController::class,'search'])->name('search.keyword.subpage');
/**
 * 404
 */

//Knowledge insurance
Route::get('knowledge', [HomeController::class, 'knowledge'])->name('knowledge');

/**
 * File manager laravel
 */
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
