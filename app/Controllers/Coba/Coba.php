<?php

namespace App\Controllers\Coba;

use App\Controllers\BaseController;

class Coba extends BaseController
{
    public function index()
    {
        return view('CobaView/coba');
    }
}