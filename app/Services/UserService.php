<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function getLoggedUser($request)
    {
        return $this->userRepository->getLoggedUser($request);
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
