<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartementController;

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
Route::resource('companies', PositionController::class);
Route::resource('companies', DepartementController::class);

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');


Route::middleware('auth')->group(
    function() {
        Route::get('/', function () {
            return view('home', ['title' => 'Home']);
        })->name('home');
        Route::get('password', [UserController::class, 'password'])->name('password');
        Route::post('password', [UserController::class, 'password_action'])->name('password.action');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');

        //route position
        Route::resource('positions', PositionController::class);
        Route::get('departement/export-pdf', [DepartementController::class, 'exportPDF'])->name('departements.exportPDF');
        Route::resource('departements', DepartementController::class);
    });