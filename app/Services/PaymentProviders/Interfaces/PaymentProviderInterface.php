<?php

namespace App\Services\PaymentProviders\Interfaces;

use App\Services\utils\Http;

interface PaymentProviderInterface
{
    public function __construct(Http $httpClient);

    public function charge(string $email, int $mount): string;
}
