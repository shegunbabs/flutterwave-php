<?php


namespace Flutterwave\Service;


class Banks extends AbstractService
{

    public function getAllBanks($country="NG"){
        $path = "https://api.flutterwave.com/v3/banks/$country";
        return $this->request("GET", $path);
    }


    public function getBankBranches($bank_code){
        $path = "https://api.flutterwave.com/v3/banks/{$bank_code}/branches";
        return $this->request("GET", $path);
    }

}