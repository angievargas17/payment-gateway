<?php

namespace App\Config;

final class PaymentConfig
{
    private static ?self $instance = null;

    public readonly int $timeout;
    public readonly array $providers;

    private function __construct()
    {
        $this->timeout = config('Payments.timeout');
        $this->providers = config('Payments.providers');
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }
}
