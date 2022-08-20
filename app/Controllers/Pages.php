<?php

namespace App\Controllers;

use App\Models\ModelBuku;

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
    public function list_buku()
    {
        $data = [
            "title" => "Daftar Buku"
        ];

        $modelBuku = new ModelBuku;
        $listBuku = $modelBuku->findAll();
        dd($listBuku);
        echo view('pages/list_buku', $data);
    }
}