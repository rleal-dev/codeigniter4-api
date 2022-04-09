<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    private Role $roleModel;

    public function __construct()
    {
        $this->roleModel = new Role;
    }

    public function findAll()
    {
        return $this->roleModel->paginate(1);
    }
}
