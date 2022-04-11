<?php

namespace App\Controllers\Auth;

use App\Services\Auth\LoginService;
use CodeIgniter\RESTful\ResourceController;

class LoginController extends ResourceController
{
    public function login()
    {
        $token = (new LoginService)->login($this->request);

        if (! $token) {
            return $this->failUnauthorized('Invalid username or password!');
        }

        return $this->respond([
            'message' => 'Login Successfully!',
            'access_token' => $token,
        ]);
    }
}
