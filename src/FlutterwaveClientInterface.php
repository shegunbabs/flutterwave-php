<?php


namespace Flutterwave;


interface FlutterwaveClientInterface
{

    public function getSecretKey();

    public function getPublicKey();

    public function getEncryptionKey();

    public function getApiBase();

    public function request($method, $path, $params, $opts);
}