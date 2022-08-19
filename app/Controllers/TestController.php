<?php

namespace App\Controllers;

class TestController extends BaseController
{
    public function index($test)
    {
        echo "Caught value from Routes = $test";
    }
}