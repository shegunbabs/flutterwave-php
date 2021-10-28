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
        return $this->get('transactions', $params);
    }


    /**
     * Get Flutterwave transaction fee
     *
     * @param array $params
     * $params['amount']        int (required) This is the amount of the product or service to be charged from the customer
     * $params['currency']      string (required) This is the specified currency to charge in
     * $params['payment_type']  string (optional) The expected values are card, debit_ng_account, mobilemoney, bank_transfer, and ach_payment
     *
     * @return array
     */
    public function getTransactionFee(array $params) : array
    {
        return $this->get("transactions/fee", $params);
    }


    public function resendTransactionWebhook()
    {

    }


    public function initiateTransactionRefund()
    {

    }


    /**
     * @param int $id
     * @return array
     */
    public function verifyTransaction(int $id): array
    {
        $path = sprintf("transactions/%s/verify", $id);
        return $this->get($path);
    }


    public function viewTransactionTimeline()
    {

    }


    public function getAllRefunds()
    {

    }
}
