<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\TwoFactorController;

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



Route::get('/verify', [TwoFactorController::class, 'index'])->name('verify.index');

Route::post('/verify', [TwoFactorController::class, 'store'])->name('verify.store');

Route::match(['get', 'post'], '/verify/resendotp', [TwoFactorController::class, 'resendotp'])->name('verify.resendotp');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'two_factor'])->name('dashboard');

require __DIR__ . '/auth.php';
