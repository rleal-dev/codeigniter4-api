<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->response->setJSON([
            'message' => 'Codeigniter 4 - Rest Api',
        ]);
    }
}
