<?php

namespace App\Controllers;

use App\Resources\{RoleCollection, RoleResource};
use App\Services\RoleService;
use App\Validations\RoleValidation;
use CodeIgniter\RESTful\ResourceController;
use Throwable;

class RoleController extends ResourceController
{
    public function __construct(
        private RoleService $roleService = new RoleService
    ) {
    }

    public function index()
    {
        $roles = $this->roleService->findAll();

        return $this->respond(new RoleCollection($roles));
    }

    public function show($id = null)
    {
        $role = $this->roleService->findOne($id);
        if (! $role) {
            return $this->failNotFound('Role not found!');
        }

        return $this->respond([
            'data' => new RoleResource($role),
        ]);
    }

    public function create()
    {
        if (! $this->validate(RoleValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->roleService->create($this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on create role!');
        }

        return $this->respond([
            'message' => 'Role created successfully!',
        ]);
    }

    public function update($id = null)
    {
        if (! $this->validate(RoleValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->roleService->update($id, $this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on update role!');
        }

        return $this->respond([
            'message' => 'Role updated successfully!',
        ]);
    }

    public function delete($id = null)
    {
        try {
            $this->roleService->delete($id);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on delete role!');
        }

        return $this->respond([
            'message' => 'Role deleted successfully!',
        ]);
    }
}
