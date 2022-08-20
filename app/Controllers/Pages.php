<?php

namespace App\Controllers;

use App\Models\ModelBuku;

class Pages extends BaseController
{
    protected $modelBuku;

    public function __construct()
    {
        $this->modelBuku = new ModelBuku();
    }

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
        $listBuku = $this->modelBuku->findAll();
        $data = [
            "title" => "Daftar Buku",
            "list_buku" => $listBuku
        ];

        echo view('pages/list_buku', $data);
    }

    public function detail_buku($buku)
    {
        $detailBuku = $this->modelBuku->where('slug_judul', $buku)->findAll();
        $data = [
            "title" => "Detail Buku",
            "detailBuku" => $detailBuku
        ];
        echo view('pages/detail_buku', $data);
    }

    public function form_tambah()
    {
        $data = [
            "title" => "Tambah Data",
        ];
        echo view('pages/form_tambah', $data);
    }

    public function save()
    {
        $input = $this->request->getVar();
        $slug = url_title($input["judul"], '_', true);
        $this->modelBuku->save([
            'judul_buku' => $input["judul"],
            'slug_judul' => $slug,
            'pengarang' => $input["pengarang"],
            'penerbit' => $input["penerbit"],
            'tahun_terbit' => $input["tahun-terbit"],
            'sampul' => $input["sampul"]
        ]);
        session()->setFlashdata('message', 'Data berhasil ditambahkan');

        return redirect()->to('/pages/list_buku');
    }
}