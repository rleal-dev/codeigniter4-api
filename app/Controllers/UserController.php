<?php

namespace App\Controllers;

use App\Resources\{UserCollection, UserResource};
use App\Services\UserService;
use App\Validations\UserValidation;
use CodeIgniter\RESTful\ResourceController;
use Throwable;

class UserController extends ResourceController
{
    public function __construct(
        private UserService $userService = new UserService
    ) {
    }

    public function index()
    {
        $users = $this->userService->findAll();

        return $this->respond(new UserCollection($users));
    }

    public function show($id = null)
    {
        $user = $this->userService->findOne($id);
        if (! $user) {
            return $this->failNotFound('User not found!');
        }

        return $this->respond([
            'data' => new UserResource($user),
        ]);
    }

    public function create()
    {
        if (! $this->validate(UserValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->userService->create($this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on create user!');
        }

        return $this->respond([
            'message' => 'User created successfully!',
        ]);
    }

    public function update($id = null)
    {
        if (! $this->validate(UserValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->userService->update($id, $this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on update user!');
        }

        return $this->respond([
            'message' => 'User updated successfully!',
        ]);
    }

    public function delete($id = null)
    {
        try {
            $this->userService->delete($id);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on delete user!');
        }

        return $this->respond([
            'message' => 'User deleted successfully!',
        ]);
    }
}
