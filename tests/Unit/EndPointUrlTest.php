<?php

beforeEach(function()
{
    $this->http = new GuzzleHttp\Client(['base_uri' => 'https://api.flutterwave.com']);
});


afterEach(function()
{
    $this->http = null;
});

it('has valid base url', function() {


    $response = $this->http->request('GET', '/v3');

    $this->assertEquals(401, $response->getStatusCode());



//    $base_url = 'http://api.flutterwave.com';
//    $data = file_get_contents($base_url);
//    $result = json_decode($data, true);
//
//    $this->assertEquals($result['rave'], "pay");

});
