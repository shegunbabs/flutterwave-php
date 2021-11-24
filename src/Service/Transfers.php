<?php

namespace Flutterwave\Service;

class Transfers extends AbstractService
{
    /**
     * @param  array  $params  = ['amount', 'currency', 'type']
     * @return array|bool|float|int|mixed|object|string|string[]|null
     */
    public function getTransferFee(array $params): array
    {
        $url_query = http_build_query($params);
        $path = "transfers/fee?$url_query";
        //dd($path);
        return $this->request('GET', $path);
    }

    public function createTransfer(array $params): array
    {
        $path = 'transfers';

        return $this->request('POST', $path, $params);
    }
}
