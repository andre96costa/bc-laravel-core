<?php

namespace App\Services\PaymentProviders;

use App\Services\PaymentProviders\Interfaces\PaymentProviderInterface;
use App\Services\utils\Http;

class PaddlePaymentProvider implements PaymentProviderInterface
{
    public function __construct(
        Http $clientHttp
    ) {}

    
    public function charge(string $email, int $amount): string
    {
        return "We successfully charged EUR {$amount} from {$email}";
    }
}