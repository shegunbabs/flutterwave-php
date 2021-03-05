<?php

namespace Flutterwave;

use Flutterwave\Service\CoreServiceFactory;
use Flutterwave\Service\Misc;

/**
 * @property \Flutterwave\Service\Transfers $transfers
 * @property \Flutterwave\Service\PaymentRequest $paymentRequest
 * @property \Flutterwave\Service\Misc $misc
 * @property \Flutterwave\Service\Banks $banks
 * @property \Flutterwave\Service\VerifyTransaction $transactions
 * @property \Flutterwave\Service\TokenizedCharges $tokenizedCharges
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