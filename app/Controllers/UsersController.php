<?php

namespace App\Controllers;

class UsersController extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data['content'] = "Pages/Users/index";
        return view('layout/main', $data);
    }

    public function create(): string
    {
        $data = [];
        $data['content'] = "Pages/Users/create";
        return view('layout/main', $data);
    }

    public function findAll(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        try {
            $userModel = new \App\Models\UserModel();
            $users = $userModel->findAllUsers();

            return $this->response->setJSON([
                'success' => true,
                'data' => $users
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Ocorreu um erro ao buscar usuários',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function store(): \CodeIgniter\HTTP\ResponseInterface|string
    {
        try {
            $userModel = new \App\Models\UserModel();
            $data = $this->request->getPost();

            if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Todos os campos são obrigatórios'
                ]);
            }

            if ($userModel->storeUser($data)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Usuário criado com sucesso'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Falha ao criar usuário'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Ocorreu um erro ao criar usuário',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function delete(string $id): \CodeIgniter\HTTP\ResponseInterface|string
    {
        try {
            $userModel = new \App\Models\UserModel();

            if ($userModel->deleteUser($id)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Usuário excluído com sucesso'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Falha ao excluir usuário'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Ocorreu um erro ao excluir usuário',
                'error' => $e->getMessage()
            ]);
        }
    }
}
