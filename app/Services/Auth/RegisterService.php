<?php

namespace App\Services\Auth;

use App\Models\User;

class RegisterService
{
    public function register($request)
    {
        $data = [
            'name' => $request->getVar('name'),
            'email' => $request->getVar('email'),
            'password' => password_hash($request->getVar('password'), PASSWORD_BCRYPT),
        ];

        return (new User)->save($data);
    }
}
