<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use App\Services\PaymentProviders\Interfaces\PaymentProviderInterface;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Http\Request;

class StripController extends Controller
{
    public function __construct(
        private PaymentProviderInterface $paymentProvider
    ) {}

    public function index()
    {
        $checkout = new Checkout('andre@andre.com', 8900);
        return $checkout->handle($this->paymentProvider);
    }
}
