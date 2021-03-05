<?php


namespace Flutterwave\Service;


use Flutterwave\FlutterwaveClient;

abstract class AbstractService
{
    protected $client;


    /**
     * AbstractService constructor.
     * @param $client
     */
    public function __construct(FlutterwaveClient $client)
    {
        $this->client = $client;
    }

    public function getClient(){
        return $this->client;
    }

    protected static function formatParams($params)
    {
        if (null === $params) {
            return null;
        }
        \array_walk_recursive($params, function (&$value, $key) use (&$params) {
            if (empty($value)) {
                unset($params[$key]);
            }
        });

        return $params;
    }

    protected function request($method, $path, $params=[], $opts=[])
    {
        return $this->getClient()->request($method, $path, static::formatParams($params), $opts);
    }

}