<?php


namespace Flutterwave\Service;


class PaymentRequest extends AbstractService
{
    private $path = "payments";


    /**
     * @param array $params [
     *  'tx_ref', 'amount', 'currency', 'payment_options', 'redirect_url',
     *  'customer' => ['email', 'phonenumber', 'name'],
     *  'customizations' => ['title', 'description', 'logo']
     * ]
     * @param array $opts
     * @return array|bool|float|int|mixed|object|string|string[]|null
     */
    public function create(array $params, array $opts=[]){

        //return response from API
        $params = static::formatParams($params);

        return $this->request('POST', $this->path, $params, $opts);
    }


}
