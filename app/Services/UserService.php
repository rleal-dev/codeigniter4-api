<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $userRepository = new UserRepository
    ) {
    }

    public function findAll()
    {
        return $this->userRepository->findAll();
    }

    public function findOne($id)
    {
        return $this->userRepository->findOne($id);
    }

    public function create($request)
    {
        return $this->userRepository->create($request);
    }

    public function update($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
