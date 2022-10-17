<?php

use App\Http\Controllers\BlackListController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\Gate1Controller;
use App\Http\Controllers\Gate2Controller;
use App\Http\Controllers\Gate3Controller;
use App\Http\Controllers\Gate4Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    //Route::resource('roles', RoleController::class);
    Route::prefix('roles')->group(function () {
        Route::get('/index', [RoleController::class, "index"])->name('roles.index');
        Route::get('/create', [RoleController::class, "create"])->name('roles.create');
        Route::get('/show/{id}', [RoleController::class, "show"])->name('roles.show');
        Route::post('/store', [RoleController::class, "store"])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, "edit"])->name('roles.edit');
        Route::post('/update/{id}', [RoleController::class, "update"])->name('roles.update');
        Route::any('/delete/{id}', [RoleController::class, "destroy"])->name('roles.destroy');
    });
    Route::prefix('users')->group(function () {
        Route::get('/index', [UserController::class, "index"])->name('users.index');
        Route::get('/create', [UserController::class, "create"])->name('users.create');
        Route::get('/show/{id}', [UserController::class, "show"])->name('users.show');
        Route::post('/store', [UserController::class, "store"])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, "edit"])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, "update"])->name('users.update');
        Route::any('/delete/{id}', [UserController::class, "destroy"])->name('users.destroy');
    });
    Route::prefix('trips')->group(function () {
        Route::get('/index', [TripController::class, "index"])->name('trips.index');
        Route::get('/create', [TripController::class, "create"])->name('trips.create');
        Route::get('/show/{id}', [TripController::class, "show"])->name('trips.show');
        Route::post('/store', [TripController::class, "store"])->name('trips.store');
        Route::get('/edit/{id}', [TripController::class, "edit"])->name('trips.edit');
        Route::post('/update/{id}', [TripController::class, "update"])->name('trips.update');
        Route::any('/delete/{id}', [TripController::class, "destroy"])->name('trips.destroy');
    });
    Route::prefix('drivers')->group(function () {
        Route::get('/index', [DriverController::class, "index"])->name('drivers.index');
        Route::get('/create', [DriverController::class, "create"])->name('drivers.create');
        Route::get('/show/{id}', [DriverController::class, "show"])->name('drivers.show');
        Route::post('/store', [DriverController::class, "store"])->name('drivers.store');
        Route::get('/edit/{id}', [DriverController::class, "edit"])->name('drivers.edit');
        Route::post('/update/{id}', [DriverController::class, "update"])->name('drivers.update');
        Route::any('/delete/{id}', [DriverController::class, "destroy"])->name('drivers.destroy');
    });
    Route::prefix('gate1')->group(function () {
        Route::get('/index', [Gate1Controller::class, "index"])->name('gate1.index');
        Route::get('/active/{id}', [Gate1Controller::class, "active"])->name('gate1.active');
    });
    Route::prefix('gate2')->group(function () {
        Route::get('/indexin', [Gate2Controller::class, "indexin"])->name('gate2.indexin');
        Route::post('/store', [Gate2Controller::class, "store"])->name('gate2.store');
        Route::post('/storeout', [Gate2Controller::class, "storeout"])->name('gate2.storeout');
        Route::get('/indexout', [Gate2Controller::class, "indexout"])->name('gate2.indexout');
        Route::get('/checkin/{id}', [Gate2Controller::class, "checkin"])->name('gate2.checkin');
        Route::get('/checkout/{id}', [Gate2Controller::class, "checkout"])->name('gate2.checkout');
    });
    Route::prefix('gate3')->group(function () {
        Route::get('/indexin', [Gate3Controller::class, "indexin"])->name('gate3.indexin');
        Route::post('/store', [Gate3Controller::class, "store"])->name('gate3.store');
        Route::post('/storeout', [Gate3Controller::class, "storeout"])->name('gate3.storeout');
        Route::get('/indexout', [Gate3Controller::class, "indexout"])->name('gate3.indexout');
        Route::get('/checkin/{id}', [Gate3Controller::class, "checkin"])->name('gate3.checkin');
        Route::get('/checkout/{id}', [Gate3Controller::class, "checkout"])->name('gate3.checkout');
    });
    Route::prefix('gate4')->group(function () {
        Route::get('/indexout', [Gate4Controller::class, "indexout"])->name('gate4.indexout');
        Route::post('/store', [Gate4Controller::class, "store"])->name('gate4.store');
    });
    Route::prefix('blacklist')->group(function () {
        Route::get('/index', [BlackListController::class, "index"])->name('blacklist.index');
        Route::get('/create', [BlackListController::class, "create"])->name('blacklist.create');
        Route::post('/store', [BlackListController::class, "store"])->name('blacklist.store');
        Route::post('/unblock/{id}', [BlackListController::class, "unblock"])->name('blacklist.unblock');
    });
    Route::prefix('archive')->group(function () {
        Route::get('/index', [LogController::class, "index"])->name('log.index');
    });
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');
});
