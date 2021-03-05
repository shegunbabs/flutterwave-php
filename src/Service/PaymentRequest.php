<?php


namespace Flutterwave\Service;


class PaymentRequest extends AbstractService
{
    private $path = "payments";

    public function create(array $params, array $opts=[]){

        //return response from API
        $params = static::formatParams($params);

        return $this->request('POST', $this->path, $params, $opts);
    }


}