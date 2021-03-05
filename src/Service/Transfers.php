<?php


namespace Flutterwave\Service;


class Transfers extends AbstractService
{

    public function getTransferFee(array $params)
    {
        $params = http_build_query($params);
        $path = "transfers/fee?$params";
        //dd($path);
        return $this->request("GET", $path);
    }


    

}