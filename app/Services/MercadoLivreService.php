<?php

namespace App\Services;

use GuzzleHttp\Client;

class MercadoLivreService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function generateAccessToken($code)
    {
        try {
            $response = $this->client->post("https://api.mercadolibre.com/oauth/token", [
                'form_params' => [
                    'grant_type'    => 'authorization_code',
                    'client_id'     => 'YOUR_CLIENT_ID',
                    'client_secret' => 'YOUR_CLIENT_SECRET',
                    'code'          => $code,
                    'redirect_uri'  => 'YOUR_REDIRECT_URI'
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
