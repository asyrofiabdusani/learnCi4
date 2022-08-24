<?php

namespace App\Controllers;

use App\Models\ModelPeople;

class People extends BaseController
{
    protected $modelPeople;

    public function __construct()
    {
        $this->modelPeople = new ModelPeople();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $listPeople = $this->modelPeople->search($keyword);
        } else {
            $listPeople = $this->modelPeople;
        }

        $listPerPage = 10;
        if ($this->request->getVar("page_people")) {
            $page = (intval($this->request->getVar("page_people")) - 1);
        } else {
            $page = 0;
        }
        $page = ($page * $listPerPage) + 1;


        $data = [
            'title' => 'People Page',
            'list_people' => $listPeople->paginate($listPerPage, 'people'),
            'pager' => $this->modelPeople->pager,
            'page' => $page,
        ];

        echo view('people/index', $data);
    }
}