<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function index()
    {
        return view("app");
    }

    protected function login()
    {
        return view("login");
    }
}
