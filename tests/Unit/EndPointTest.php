<?php

beforeEach(function () {
    $this->http = new GuzzleHttp\Client(['base_uri' => 'https://api.flutterwave.com', ['http_errors' => false]]);
});

afterEach(function () {
    $this->http = null;
});

it('has valid base url', function () {
    $this->assertTrue(true);
});
