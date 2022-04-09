<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class HomeController extends ResourceController
{
    public function index()
    {
        return $this->respond([
            'message' => 'Codeigniter 4 - Rest Api',
        ]);
    }
}
