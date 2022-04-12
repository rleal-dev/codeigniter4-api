<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    public function __construct(
        private RoleRepository $roleRepository = new RoleRepository
    ) {
    }

    public function findAll()
    {
        return $this->roleRepository->findAll();
    }

    public function findOne($id)
    {
        return $this->roleRepository->findOne($id);
    }

    public function create($request)
    {
        return $this->roleRepository->create($request);
    }

    public function update($id, $data)
    {
        return $this->roleRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->roleRepository->delete($id);
    }
}
