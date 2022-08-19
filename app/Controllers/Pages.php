<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Home"
        ];
        echo view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            "title" => "About"
        ];
        echo view('pages/about', $data);
    }
}