<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
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
        return $this->userModel->findAll();
    }

    public function findOne($id)
    {
        return $this->userModel->find($id);
    }

    public function create($request)
    {
        return $this->userModel->save($request->getVar());
    }

    public function update($id, $request)
    {
        return $this->userModel->update($id, $request->getVar());
    }

    public function delete($id)
    {
        return $this->userModel->delete($id);
    }
}
