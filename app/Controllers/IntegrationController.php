<?php

namespace App\Controllers;

class IntegrationController  extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data['content'] = "Pages/Integrations/index";
        return view('layout/main', $data);
    }

    public function create(): string
    {
        $data = [];
        $data['content'] = "Pages/Integrations/create";
        return view('layout/main', $data);
    }

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

    public function store(): string
    {
        try {
            $userTokenModel = new \App\Models\UserTokenModel();
            $data = $this->request->getPost();

            if (!$data['platform']) {
                throw new \Exception('O campo plataforma é obrigatório');
            }

            if (!$data['token']) {
                throw new \Exception('O campo token é obrigatório');
            }

            if ($userTokenModel->storeToken($data)) {
                return json_encode(['success' => true, 'message' => 'Integração adicionada com sucesso!']);
            } else {
                return json_encode(['success' => false, 'message' => 'Erro ao adicionar integração!']);
            }
        } catch (\Throwable $th) {
            return json_encode(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
