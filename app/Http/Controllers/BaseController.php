<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function index()
    {
        return view("app");
    }

    public function login()
    {
        return view("login");
    }
}
