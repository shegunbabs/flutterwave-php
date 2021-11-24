<?php

namespace Flutterwave\Service;

class TokenizedCharges extends AbstractService
{
    public function chargeWithToken($params, $opts = [])
    {
        $path = 'tokenized-charges';

        return $this->request('POST', $path, $params, $opts);
    }

    public function updateTokenDetails($params, $opts = [])
    {
        $token = $params['token'];
        $path = "tokens/$token";
        unset($params['token']);

        return $this->request('PUT', $path, $params, $opts);
    }
}
