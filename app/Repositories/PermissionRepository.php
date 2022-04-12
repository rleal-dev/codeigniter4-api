<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository
{
    public function __construct(
        private Permission $permissionModel = new Permission
    ) {
    }

    public function findAll()
    {
        return $this->permissionModel->findAll();
    }

    public function findOne($id)
    {
        return $this->permissionModel->find($id);
    }

    public function create($request)
    {
        return $this->permissionModel->save($request->getVar());
    }

    public function update($id, $request)
    {
        return $this->permissionModel->update($id, $request->getVar());
    }

    public function delete($id)
    {
        return $this->permissionModel->delete($id);
    }
}
