<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

class PermissionService
{
    public function __construct(
        private PermissionRepository $permissionRepository = new PermissionRepository
    ) {
    }

    public function findAll()
    {
        return $this->permissionRepository->findAll();
    }

    public function findOne($id)
    {
        return $this->permissionRepository->findOne($id);
    }

    public function create($request)
    {
        return $this->permissionRepository->create($request);
    }

    public function update($id, $data)
    {
        return $this->permissionRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->permissionRepository->delete($id);
    }
}
