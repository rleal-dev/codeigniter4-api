<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService
{
    private Permission $permissionModel;

    public function __construct()
    {
        $this->permissionModel = new Permission;
    }

    public function findAll()
    {
        return $this->permissionModel->paginate(1);
    }
}
