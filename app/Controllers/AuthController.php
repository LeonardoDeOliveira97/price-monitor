<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login(): string
    {
        $data = [];
        $data['content'] = "Pages/Auth/login";
        return view('layout/main', $data);
    }

    public function register(): string
    {
        $data = [];
        $data['content'] = "Pages/Auth/register";
        return view('layout/main', $data);
    }

    public function logout()
    {
        // Implement logout logic here (e.g., destroy session, redirect to login page)
        return redirect()->to('/login');
    }
}
