<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/profile', [ProfileController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/catalog', [HomeController::class, 'catalog'])->name('catalog')->middleware(['auth', 'verified']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/delivery', [HomeController::class, 'delivery'])->name('delivery');
Route::get('/product/{product_id}', [HomeController::class, 'product'])->name('product')->middleware(['auth', 'verified']);
Route::post('/profile/edit', [ProfileController::class, 'edit_profile'])->middleware(['auth', 'verified'])->name('editProfile');
Route::get('/basket/add/{product_id}', [BasketController::class, 'add_basket'])->name('ToBasket')->middleware(['auth', 'verified']);
Route::get('/basket/open', [BasketController::class, 'open_basket'])->name('OpenBasket')->middleware(['auth', 'verified']);
Route::post('/catalog/filter', [HomeController::class, 'filter'])->name('catalog.filter')->middleware(['auth', 'verified']);
Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::get('/liked/add/{product_id}', [BasketController::class, 'add_liked'])->name('ToLike')->middleware(['auth', 'verified']);
Route::get('/liked/open', [BasketController::class, 'open_liked'])->name('OpenLike')->middleware(['auth', 'verified']);

Route::get('/admin', [AdminController::class, 'index'])->name('Admin')->middleware([IsAdmin::class]);
Route::get('/delete/{product_id}', [AdminController::class, 'delete_position'])->name('deleteTovar')->middleware([IsAdmin::class]);
Route::get('/edit/{product_id}', [AdminController::class, 'edit_position'])->name('EditTovarRender')->middleware([IsAdmin::class]);
Route::post('/edit/{product_id}', [AdminController::class, 'save_edit_position'])->name('EditTovar')->middleware([IsAdmin::class]);
Route::post('/admin/category/add', [AdminController::class, 'add_category'])->name('AddCategory')->middleware([IsAdmin::class]);
Route::post('/admin/position/add', [AdminController::class, 'new_position'])->name('NewPosition')->middleware([IsAdmin::class]);

Route::get('/login/yandex', [AuthenticatedSessionController::class, 'RedirectYandex'])->name('login.yandex');

Route::get('/login/yandex/callback', [AuthenticatedSessionController::class, 'CallbackYandex'])->name('login.yandex.call');

require __DIR__.'/auth.php';
