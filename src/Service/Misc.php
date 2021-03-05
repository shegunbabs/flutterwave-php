<?php


namespace Flutterwave\Service;


class Misc extends AbstractService
{

    public function getBalancesPerCurrency($currency="NGN"){
        $path = "balances/$currency";
        return $this->request("GET", $path);
    }


    public function resolveBvn($bvn)
    {
        $path = "kyc/bvns/$bvn";
        return $this->request("GET", $path);
    }


    /**
     * @param $card_bin
     * @return array|bool|float|int|mixed|object|string|null
     */
    public function resolveCardBins($card_bin)
    {
        $path = "card-bins/$card_bin";
        return $this->request("GET", $path);
    }


    public function mockResolveBvn($bvn){
        $mockData = [
            '15263748596' => [
                "status" => "success",
                "message" => "BVN details fetched",
                "data" => [
                    "bvn" => "15263748596",
                    "first_name" => "Wale",
                    "middle_name" => "Martins",
                    "last_name" => "Afolabi",
                    "date_of_birth" => "09-01-1989",
                    "phone_number" => "08012345678",
                    "registration_date" => "10-11-2017",
                    "enrollment_bank" => "044",
                    "enrollment_branch" => "Idejo",
                    "image_base_64" => null,
                    "address" => null,
                    "gender" => "Male",
                    "email" => null,
                    "watch_listed" => null,
                    "nationality" => "Nigerian",
                    "marital_status" => null,
                    "state_of_residence" => null,
                    "lga_of_residence" => null,
                    "image" => null
                ],
            ]
        ];

        if ( array_key_exists($bvn, $mockData) )
        {
            return $mockData[$bvn];
        }
        return [
            "status" => "error",
            "message" => "No record for the specified BVN.",
            "data" => null,
        ];
    }

}