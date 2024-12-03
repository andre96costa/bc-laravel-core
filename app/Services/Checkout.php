<?php

namespace App\Services;

use App\Services\PaymentProviders\Interfaces\PaymentProviderInterface;

class Checkout
{
    public function __construct(
        private string $email, 
        private int $amount
    ){}

    public function handle(PaymentProviderInterface $paymentProvider): mixed
    {
        return $paymentProvider->charge($this->email, $this->amount);
    }
}

