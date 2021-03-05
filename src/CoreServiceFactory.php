<?php

namespace Flutterwave;

use function array_key_exists;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property Transfers $transfers
 * @property PaymentRequest $paymentRequest
 * @property VerifyTransaction $transactions
 * @property Misc $misc
 * @property Banks $banks
 * @property TokenizedCharges $tokenizedCharges
 *
 */

class CoreServiceFactory extends AbstractServiceFactory
{

    private static $classMap = [
        "transfers" => Transfers::class,
        'paymentRequest' => PaymentRequest::class,
        'transactions' => VerifyTransaction::class,
        'misc' => Misc::class,
        'banks' => Banks::class,
        'tokenizedCharges' => TokenizedCharges::class,
    ];

    protected function getServiceClass($name)
    {
        return array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
