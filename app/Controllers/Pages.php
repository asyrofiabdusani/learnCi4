<?php

namespace App\Controllers;

class Pages extends BaseController
{

    public function index()
    {
        $data = [
            "title" => "Home"
        ];
        echo view('layout/header', $data);
        echo view('pages/index');
        echo view('layout/footer');
    }
}