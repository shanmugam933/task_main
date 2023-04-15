<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
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
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::get('show',[AuthController::class,'show'])->name('show');
Route::get('edit/{id}',[AuthController::class,'edit'])->name('edit');
// Route::get('update',[AuthController::class,'registration_update'])->name('registration_update');
Route::post('update',[AuthController::class,'registration_update'])->name('registration_update');
Route::post('update/{id}',[AuthController::class,'update'])->name('update');


Route::get('countries',[AuthController::class,'getCountries'])->name('countries');
Route::get('states',[AuthController::class,'getStates'])->name('states');
Route::get('cities',[AuthController::class,'getCities'])->name('cities');

Route::get('delete/{id}',[AuthController::class,'delete'])->name('delete');
Route::get('view',[HomeController::class,'view'])->name('view');
Route::post('/import',[HomeController::class,'import'])->name('import');
Route::get('/export',[HomeController::class,'export'])->name('export');
