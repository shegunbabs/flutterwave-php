<?php


namespace Flutterwave\Service;


use Flutterwave\FlutterwaveClient;

abstract class AbstractService
{
    protected $client;


    /**
     * AbstractService constructor.
     * @param FlutterwaveClient $client
     */
    public function __construct(FlutterwaveClient $client)
    {
        $this->client = $client;
    }


    protected function getClient(): FlutterwaveClient
    {
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


    protected function get($path, $params=[], $opts=[])
    {
        return $this->request('GET', $path, $params, $opts);
    }

}
