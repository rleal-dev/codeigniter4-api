<?php

namespace App\Repositories;

use App\Models\{User, UserRole};

class UserRepository
{
    public function __construct(
        private User $userModel = new User,
        private UserRole $userRoleModel = new UserRole
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
        $db = db_connect();
        $db->transBegin();

        $userId = $this->userModel->insert($request->getVar());
        $this->attachRoles($userId, $request->getVar('roles'));

        $db->transCommit();

        return $userId;
    }

    public function update($id, $request)
    {
        $db = db_connect();
        $db->transBegin();

        $this->userModel->update($id, $request->getVar());
        $this->attachRoles($id, $request->getVar('roles'));

        $db->transCommit();

        return $id;
    }

    public function delete($id)
    {
        return $this->userModel->delete($id);
    }

    private function attachRoles($userId, $roles)
    {
        if (! $roles) {
            return false;
        }

        foreach ($roles as $roleId) {
            $this->userRoleModel->save([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }
}
