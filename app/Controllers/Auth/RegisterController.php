<?php

namespace App\Controllers\Auth;

use App\Services\Auth\RegisterService;
use App\Validations\Auth\RegisterValidation;
use CodeIgniter\RESTful\ResourceController;
use Throwable;

class RegisterController extends ResourceController
{
    public function register()
    {
        if (! $this->validate(RegisterValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            (new RegisterService)->register($this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on register user!');
        }

        return $this->respond([
            'message' => 'Registered Successfully!',
        ]);
    }
}
