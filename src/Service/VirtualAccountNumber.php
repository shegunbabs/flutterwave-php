<?php


namespace Flutterwave\Service;


class VirtualAccountNumber extends AbstractService
{

    public function createVirtualAccountNumber($params, $opts=[])
    {
        $path = 'virtual-account-numbers';
        return $this->request("POST", $path, $params, $opts);
    }


    public function getVirtualAccountNumber($params, $opts=[])
    {
        $path = 'bulk-virtual-account-numbers';
        return $this->request("GET", $path, $params, $opts);
    }


    public function createBulkVirtualAccountNumber($batch_id, $opts=[])
    {
        $path = "bulk-virtual-account-numbers/$batch_id";
        return $this->request("POST", $path, [], $opts);
    }


    public function getBulkVirtualAccountNumber($order_ref, $opts)
    {
        $path = "virtual-account-numbers/$order_ref";
        return $this->request("GET", $path, [], $opts);
    }
}
