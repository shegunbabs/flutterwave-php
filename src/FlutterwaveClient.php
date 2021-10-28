<?php

namespace Flutterwave;

use Flutterwave\Service\Banks;
use Flutterwave\Service\Misc;
use Flutterwave\Service\PaymentRequest;
use Flutterwave\Service\TokenizedCharges;
use Flutterwave\Service\Transactions;
use Flutterwave\Service\Transfers;
use Flutterwave\Service\VerifyTransaction;
use Flutterwave\Service\VirtualAccountNumber;

/**
 *
 * @property Transfers $transfers
 * @property PaymentRequest $paymentRequest
 * @property Misc $misc
 * @property Banks $banks
 * @property VerifyTransaction $transactions
 * @property TokenizedCharges $tokenizedCharges
 * @property VirtualAccountNumber $virtualAccountNumber
 *
 */


class FlutterwaveClient extends BaseFlutterwaveClient
{

    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if ( null === $this->coreServiceFactory ){
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
