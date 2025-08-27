<?php

namespace App\Controllers;

class MercadoLivreIntegrationController extends BaseController
{
    public function addNewIntegration($integration): string
    {
        try {
            switch ($integration) {
                case 'mercado_livre':
                    $api_authorization_url = "https://auth.mercadolivre.com.br/";
                    $api_authorization_url .= "authorization?response_type=code";
                    $api_authorization_url .= "&client_id=" . MERCADO_LIVRE_CLIENT_ID;
                    $api_authorization_url .= "&redirect_uri=" . MERCADO_LIVRE_REDIRECT_URI;
                    header("Location: " . $api_authorization_url);
                    exit;
                    break;
                default:
                    throw new \Exception('Integração não implementada');
                    break;
            }
        } catch (\Throwable $th) {
            return  print_r($th);
        }
    }

    public function callback(string $code): string
    {
        return $code;
    }
}
