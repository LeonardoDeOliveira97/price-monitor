<?php

namespace App\Controllers;

class ProductsController extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data['content'] = "Pages/Products/index";
        return view('layout/main', $data);
    }

    public function create(): string
    {
        $data = [];
        $data['content'] = "Pages/Products/create";
        return view('layout/main', $data);
    }

    public function edit(int $id): string
    {
        $data = [];
        $data['content'] = "Pages/Products/edit";
        return view('layout/main', $data);
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        // Implement delete logic here (e.g., remove product from database)
        return redirect()->to('/products');
    }

    public function monitoring(): string
    {
        $data = [];
        $data['content'] = "Pages/Products/monitoring";
        return view('layout/main', $data);
    }
}
