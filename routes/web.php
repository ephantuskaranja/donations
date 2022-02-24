<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [DonationController::class, 'index']);
Route::post('/donate', [DonationController::class, 'sendRequest'])->name('donate');


Route::get('email', [MailController::class, 'index']);
