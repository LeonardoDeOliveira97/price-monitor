<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data['content'] = "index";
        return view('layout/main', $data);
    }
}
