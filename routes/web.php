<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PermissionController;

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
    return view('welcome');
});
Route::view('home', 'home')->name('home')->middleware(['auth']);
Route::view('profile', 'profile.edit')->name('profile.edit')->middleware(['auth']);

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::prefix('settings')->group(function () {
			Route::get('/', [SettingController::class, 'edit'])->name('settings.edit');
			Route::post('/', [SettingController::class, 'update'])->name('settings.update');
        });
        
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::post('/', [UserController::class, 'store'])->name('users.store');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
		});

        Route::prefix('events')->group(function () {
            Route::get('/', [EventController::class, 'index'])->name('events.index');
            Route::post('/', [EventController::class, 'store'])->name('events.store');
            Route::get('/create', [EventController::class, 'create'])->name('events.create');
            Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
            Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
            Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
            Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
        });

        Route::prefix('blogs')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
            Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
            Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
            Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
            Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
            Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
            Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        });

        Route::prefix('sermons')->group(function () {
            Route::get('/', [SermonController::class, 'index'])->name('sermons.index');
            Route::post('/', [SermonController::class, 'store'])->name('sermons.store');
            Route::get('/create', [SermonController::class, 'create'])->name('sermons.create');
            Route::get('/{sermon}', [SermonController::class, 'show'])->name('sermons.show');
            Route::get('/{sermon}/edit', [SermonController::class,'edit'])->name('sermons.edit');
            Route::put('/{sermon}', [SermonController::class,'update'])->name('sermons.update');
            Route::delete('/{sermon}', [SermonController::class,'destroy'])->name('sermons.destroy');
        });
    });