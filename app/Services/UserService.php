<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function getLoggedUser($request)
    {
        return $this->userModel->where('email', $request->token->email)->first();
    }

    public function findAll()
    {
        return $this->userModel->paginate(1);
    }
}
