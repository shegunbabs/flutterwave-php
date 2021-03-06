<?php


namespace Flutterwave;


abstract class AbstractServiceFactory
{
    private $client;
    /**
     * @var array
     */
    private $services;

    /**
     * AbstractServiceFactory constructor.
     * @param $client
     */
    public function __construct(FlutterwaveClient $client)
    {
        $this->client = $client;
        $this->services = [];
    }


    abstract protected function getServiceClass($name);


    public function __get($name)
    {
        $serviceClass = $this->getServiceClass($name);
        if (null !== $serviceClass){
            if (!array_key_exists($name, $this->services)){
                $this->services[$name] = new $serviceClass($this->client);
            }
            return $this->services[$name];
        }
        \trigger_error('Undefined property: ' . static::class . '::$' . $name);

        return null;
    }
}
