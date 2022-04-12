<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(
        private User $userModel = new User
    ) {
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
        return $this->userModel->save($request->getPost());
    }

    public function update($id, $request)
    {
        return $this->userModel->update($id, $request->getPost());
    }

    public function delete($id)
    {
        return $this->userModel->delete($id);
    }
}
