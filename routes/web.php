<?php

use App\Facades\Stripe;
use App\Http\Controllers\CieloController;
use App\Http\Controllers\StripController;
use App\Services\Checkout;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\PaddlePaymentProvider;
use App\Services\PaymentProviders\StripePaymentProvider;
use App\Services\utils\Http;
use App\Services\utils\ThirdParty;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learning-container', function(StripePaymentProvider $paymentProvider){
    // $paymentProvider = app(CieloPaymentProvider::class);
    // $checkout = new Checkout('andre@andre.com', 8900);
    // return $checkout->handle($paymentProvider);

    return Stripe::charge('andre@andre.com', 8900);
});

Route::get('stripe', [StripController::class, 'index']);
Route::get('cielo', [CieloController::class, 'index']);