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
            "validation" => \config\Services::validation()
        ];
        echo view('pages/form_tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => [
                    'required',
                    'is_unique[daftar_buku.judul_buku]'
                ],
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => 'judul buku yang diinput sudah tersedia'
                ]
            ]
        ])) {
            return redirect()->to('pages/form_tambah')->withInput();
        }

        if (!$this->validate([
            'sampul' => [
                'rules' => [
                    'uploaded[sampul]',
                    // 'max_size[sampul,2048]',
                    // 'mime_in[sampul,image/png,image/jpg]',
                    // 'ext_in[sampul,png,jpg,gif]',
                    // 'is_image[sampul]'
                ],
                'errors' => [
                    'uploaded' => 'Error upload file'
                ]
            ]
        ])) {
            return redirect()->to('pages/form_tambah')->withInput();
        }
        $nameImg = $this->request->getFile('sampul')->getRandomName();
        $this->request->getFile('sampul')->move('img', $nameImg);

        $input = $this->request->getVar();
        $slug = url_title($input["judul"], '_', true);
        // dd($slug);
        $this->modelBuku->save([
            'judul_buku' => $input["judul"],
            'slug_judul' => $slug,
            'pengarang' => $input["pengarang"],
            'penerbit' => $input["penerbit"],
            'tahun_terbit' => $input["tahun-terbit"],
            'sampul' => $nameImg
        ]);
        session()->setFlashdata('message', 'Data berhasil ditambahkan');

        return redirect()->to('/pages/list_buku');
    }

    public function delete($id)
    {
        $file = $this->modelBuku->where('id_buku', $id)->findAll();
        $nameImg = $file[0]["sampul"];

        $this->modelBuku->delete($id);
        unlink('img/' . $nameImg);

        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('/pages/list_buku');
    }

    public function edit($slug)
    {
        $data = [
            "title" => "Edit Data",
            "data_buku" => $this->modelBuku->where('slug_judul', $slug)->findAll(),
            "validation" => \config\Services::validation()
        ];
        echo view('pages/form_edit', $data);
    }

    public function update()
    {
        $input = $this->request->getVar();
        $slug = url_title($input["judul"], '_', true);

        if ($slug == $input["slug"]) {
            $rules = ['required'];
            $errors = [
                'required' => '{field} harus diisi',
            ];
        } else {
            $rules = ['required', 'is_unique[daftar_buku.judul_buku]'];
            $errors = [
                'required' => '{field} harus diisi',
                'is_unique' => 'judul buku yang diinput sudah tersedia'
            ];
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rules,
                'errors' => $errors,
            ]
        ])) {
            $validation = \config\Services::validation();
            session()->setFlashdata('message', $validation->getError());
            return redirect()->to("pages/edit/" . $input["slug"])->withInput()->with('validation', $validation);
        }

        $this->modelBuku->save([
            'id_buku' => $input["id"],
            'judul_buku' => $input["judul"],
            'slug_judul' => $slug,
            'pengarang' => $input["pengarang"],
            'penerbit' => $input["penerbit"],
            'tahun_terbit' => $input["tahun-terbit"],
            'sampul' => $input["sampul"]
        ]);
        session()->setFlashdata('message', 'Data berhasil diubah');

        return redirect()->to('/pages/list_buku');
    }
}