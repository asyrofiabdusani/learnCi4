<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}