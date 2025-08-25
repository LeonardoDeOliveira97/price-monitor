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
}
