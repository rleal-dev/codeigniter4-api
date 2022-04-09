<?php

namespace App\Controllers\Auth;

use CodeIgniter\RESTful\ResourceController;

class LoginController extends ResourceController
{
    public function login()
    {
        return $this->respond([
            'route' => 'login',
        ]);
    }
}
