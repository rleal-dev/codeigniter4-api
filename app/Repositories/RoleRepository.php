<?php

namespace App\Repositories;

use App\Models\{Role, RolePermission};

class RoleRepository
{
    public function __construct(
        private Role $roleModel = new Role,
        private RolePermission $rolePermissionModel = new RolePermission()
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
        $db = db_connect();
        $db->transBegin();

        $roleId = $this->roleModel->insert($request->getVar());
        $this->attachPermissions($roleId, $request->getVar('permissions'));

        $db->transCommit();

        return $roleId;
        
    }

    public function update($id, $request)
    {
        $db = db_connect();
        $db->transBegin();

        $this->roleModel->update($id, $request->getVar());
        $this->attachPermissions($id, $request->getVar('permissions'));

        $db->transCommit();

        return $id;

    }

    public function delete($id)
    {
        return $this->roleModel->delete($id);
    }

    private function attachPermissions($roleId, $permissions)
    {
        if (! $permissions) {
            return false;
        }

        foreach ($permissions as $permissionId) {
            $this->rolePermissionModel->save([
                'role_id' => $roleId,
                'permission_id' => $permissionId
            ]);
        }
    }
}
