<?php

namespace App\Controllers\Auth;

use CodeIgniter\RESTful\ResourceController;

class RegisterController extends ResourceController
{
    public function register()
    {
        return $this->respond([
            'route' => 'register',
        ]);
    }
}
