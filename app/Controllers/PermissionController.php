<?php

namespace App\Controllers;

use App\Resources\{PermissionCollection, PermissionResource};
use App\Services\PermissionService;
use App\Validations\PermissionValidation;
use CodeIgniter\RESTful\ResourceController;
use Throwable;

class PermissionController extends ResourceController
{
    public function __construct(
        private PermissionService $permissionService = new PermissionService
    ) {
    }

    public function index()
    {
        $permissions = $this->permissionService->findAll();

        return $this->respond(new PermissionCollection($permissions));
    }

    public function show($id = null)
    {
        $permission = $this->permissionService->findOne($id);
        if (! $permission) {
            return $this->failNotFound('Permission not found!');
        }

        return $this->respond([
            'data' => new PermissionResource($permission),
        ]);
    }

    public function create()
    {
        if (! $this->validate(PermissionValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->permissionService->create($this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on create permission!');
        }

        return $this->respond([
            'message' => 'Permission created successfully!',
        ]);
    }

    public function update($id = null)
    {
        if (! $this->validate(PermissionValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->permissionService->update($id, $this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on update permission!');
        }

        return $this->respond([
            'message' => 'Permission updated successfully!',
        ]);
    }

    public function delete($id = null)
    {
        try {
            $this->permissionService->delete($id);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on delete permission!');
        }

        return $this->respond([
            'message' => 'Permission deleted successfully!',
        ]);
    }
}
