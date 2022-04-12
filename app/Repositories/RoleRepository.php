<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function __construct(
        private Role $roleModel = new Role
    ) {
    }

    public function findAll()
    {
        return $this->roleModel->findAll();
    }

    public function findOne($id)
    {
        return $this->roleModel->find($id);
    }

    public function create($request)
    {
        return $this->roleModel->save($request->getPost());
    }

    public function update($id, $request)
    {
        return $this->roleModel->update($id, $request->getPost());
    }

    public function delete($id)
    {
        return $this->roleModel->delete($id);
    }
}
