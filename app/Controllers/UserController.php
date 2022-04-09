<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        return $this->response->setJSON([
            'name' => 'User Test',
        ]);
    }
}
