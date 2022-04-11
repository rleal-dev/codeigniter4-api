<?php

namespace App\Services\Auth;

use App\Models\User;

class RegisterService
{
    public function register($request)
    {
        return (new User)->save($request->getVar());
    }
}
