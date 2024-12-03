<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use App\Services\PaymentProviders\Interfaces\PaymentProviderInterface;
use Illuminate\Http\Request;

class CieloController extends Controller
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
