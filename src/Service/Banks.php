<?php

namespace Flutterwave\Service;

class Banks extends AbstractService
{
    /**
     * @param  string  $country
     * @return array|bool|float|int|mixed|object|string|string[]|null
     */
    public function getAllBanks($country = 'NG')
    {
        $path = "https://api.flutterwave.com/v3/banks/$country";

        return $this->request('GET', $path);
    }

    public function getBankBranches($bank_code)
    {
        $path = "https://api.flutterwave.com/v3/banks/{$bank_code}/branches";

        return $this->request('GET', $path);
    }
}
