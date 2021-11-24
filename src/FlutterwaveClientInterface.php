<?php

namespace Flutterwave;

interface FlutterwaveClientInterface
{
    public function getSecretKey(): string;

    public function getPublicKey(): string;

    public function getEncryptionKey(): string;

    public function getApiBase(): string;

    public function request(string $method, string $path, array $params, array $opts): array;
}
