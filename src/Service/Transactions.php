<?php


namespace Flutterwave\Service;


class Transactions extends AbstractService
{

    /**
     * @param array $params = [
     * 'from' => '...', 'to' => '...', 'page' => '...',
     * 'customer_email' => '...', 'status' => '...', 'tx_ref' => '...',
     *  'customer_fullname' => '...', 'currency' => '...',
     * ]
     * @return array
     */
    public function getAllTransactions(array $params) : array
    {
        $path = 'transactions';
        return $this->get($path, $params);
    }


    public function getTransactionFee()
    {

    }


    public function resendTransactionWebhook()
    {

    }


    public function initiateTransactionRefund()
    {

    }


    public function verifyTransaction()
    {

    }


    public function viewTransactionTimeline()
    {

    }


    public function getAllRefunds()
    {

    }
}
