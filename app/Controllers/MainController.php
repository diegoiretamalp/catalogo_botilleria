<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index(): string
    {
        return view('layout/index_view');
    }
}