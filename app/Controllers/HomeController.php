<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data['content'] = "Pages/Home/index";
        return view('layout/main', $data);
    }
}
