<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
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
    return view('view');
});

Route::get('sign_out', function () {
    return [
        'message' => 'Please Login'
    ];
})->name('unauthenticated');



Route::get('mail', [Controller::class, 'testMail']);
