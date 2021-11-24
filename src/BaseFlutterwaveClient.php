<?php

namespace Flutterwave;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;

class BaseFlutterwaveClient implements FlutterwaveClientInterface
{
    protected const DEFAULT_API_BASE = 'https://api.flutterwave.com/v3/';

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
     */
    public function __construct()
    {
        $args = func_get_args();
        $config = [
            'secret_key' => $args[0],
            'public_key' => $args[1] ?? null,
            'enc_key' => $args[2] ?? null,
        ];

        $this->defaultOpts = [
            'headers' => [
                'Authorization' => 'Bearer '.$config['secret_key'],
                'Content-Type' => 'application/json',
            ],
        ];

        $this->config = array_merge($this->getDefaultConfig(), $config);
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->config['secret_key'];
    }

    public function getPublicKey(): string
    {
        return $this->config['public_key'];
    }

    public function getEncryptionKey(): string
    {
        return $this->config['enc_key'];
    }

    /**
     * Sets the config as test when called.
     *
     * @return void
     */
    public function setPaymentOptions(): void
    {
        $args = func_get_args();
        $this->config['payment_options'] = implode(',', $args);
    }

    public function getOpts(): array
    {
        return $this->defaultOpts;
    }

    /**
     * @param  string  $method
     * @param  string  $path
     * @param  array  $params
     * @param  array  $opts
     * @return array
     *
     * @throws GuzzleException
     */
    public function request(string $method, string $path, $params = [], $opts = []): array
    {
        //merge $opts with $this->getOpts()
        if (is_array($opts)) {
            $this->defaultOpts = array_merge($this->defaultOpts, $opts);
        }

        $client = new Client([
            'base_uri' => self::DEFAULT_API_BASE,
            'http_errors' => false,
        ]);

        $opts = $this->getOpts();
        count($params) ? $opts = array_merge($opts, ['json' => $params]) : '';

        try {
            $response = $client->request($method, $path, $opts)->getBody();

            return \json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        } catch (RequestException $exception) {
            return [
                'status' => 'error',
                'message' => 'Request error: '.$exception->getMessage(),
            ];
        } catch (TransferException $exception) {
            return [
                'status' => 'error',
                'message' => 'Transfer error: '.$exception->getMessage(),
            ];
        } catch (\Exception $exception) {
            return [
                'status' => 'error',
                'message' => 'Unknown error: '.$exception->getMessage(),
            ];
        }
    }

    public function getApiBase(): string
    {
        // TODO: Implement getApiBase() method.
        return $this->getDefaultConfig()['api_base'];
    }

    private function getDefaultConfig(): array
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
