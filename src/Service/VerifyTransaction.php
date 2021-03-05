<?php


namespace Flutterwave\Service;


class VerifyTransaction extends AbstractService
{
    private $path = "transactions/%s/verify";

    public function verify($id) {

        $path = sprintf($this->path, $id);

        return $this->request("GET", $path);
    }
}