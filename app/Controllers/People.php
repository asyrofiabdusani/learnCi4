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
        $listPerPage = 10;
        if ($this->request->getVar()) {
            $page = (intval($this->request->getVar("page")) - 1);
        } else {
            $page = 0;
        }
        $page = ($page * $listPerPage) + 1;

        $data = [
            'title' => 'People Page',
            'list_people' => $this->modelPeople->paginate($listPerPage),
            'pager' => $this->modelPeople->pager,
            'page' => $page,
        ];

        echo view('people/index', $data);
    }
}