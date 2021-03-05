<?php

namespace Flutterwave;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;

class BaseFlutterwaveClient implements FlutterwaveClientInterface
{

    const DEFAULT_API_BASE = 'https://api.flutterwave.com/v3/';

    /**
     * @var array
     */
    private $config;

    /**
     * @var array
     */
    private $defaultOpts;

    /**
     * @var array
     */
    private $test_config;

    /**
     * BaseFlutterwaveClient constructor.
     * @param string $config This is the secret key
     */
    public function __construct($config)
    {
        $args = func_get_args();
        $config = [
            'secret_key' => $args[0],
            'public_key' => $args[1] ?? null,
            'enc_key' => $args[2]?? null,
        ];

        $this->defaultOpts = [
            'headers' => [
                'Authorization' => "Bearer " .$config['secret_key'],
                'Content-Type' => 'application/json',
            ]
        ];

        $this->config = array_merge($this->getDefaultConfig(), $config);
    }


    /**
     * @return null|string
     */
    public function getSecretKey()
    {
        return $this->config['secret_key'];
    }

    public function getPublicKey()
    {
        return $this->config['public_key'];
    }

    public function getEncryptionKey()
    {
        return $this->config['enc_key'];
    }

    /**
     * Sets the config as test when called
     * @return void
     */
    public function setPaymentOptions(){
        $args = func_get_args();
        $this->config['payment_options'] = implode(',', $args);
    }

    public function getOpts() : array {
        return $this->defaultOpts;
    }

    /**
     * @param $method
     * @param $path
     * @param array $params
     * @param array $opts
     * @return array|bool|float|int|mixed|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $path, $params=[], $opts=[])
    {
        //merge $opts with $this->getOpts()
        if (is_array($opts)):
            $this->defaultOpts = array_merge($this->defaultOpts, $opts);
        endif;


        $client = new Client([
            'base_uri' => self::DEFAULT_API_BASE,
            'http_errors' => false,
        ]);

        $opts = $this->getOpts();
        is_array($params) ? $opts = array_merge($opts, ['json' => $params]) : "" ;

        try{
            $response = $client->request($method, $path, $opts)->getBody();
            return \GuzzleHttp\json_decode($response, true);
        }
        catch (RequestException $exception){
            return [
                'status' => 'error',
                'message' => 'Request error: ' .$exception->getMessage(),
            ];
        }
        catch (TransferException $exception){
            return [
                'status' => 'error',
                'message' => 'Transfer error: ' .$exception->getMessage(),
            ];
        }
        catch (\Exception $exception){
            return [
                'status' => 'error',
                'message' => 'Unknown error: ' .$exception->getMessage(),
            ];
        }
    }

    public function getApiBase()
    {
        // TODO: Implement getApiBase() method.
    }

    private function getDefaultConfig()
    {
        return [
            'secret_key' => null,
            'public_key' => null,
            'enc_key' => null,
            'api_version' => 'v3',
            'api_base' => self::DEFAULT_API_BASE,
        ];
    }
}