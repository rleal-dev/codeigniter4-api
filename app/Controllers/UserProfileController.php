<?php

namespace App\Controllers;

use App\Resources\ProfileResource;
use CodeIgniter\RESTful\ResourceController;

class UserProfileController extends ResourceController
{
    public function index()
    {
        return $this->respond([
            'data' => new ProfileResource($this->request->user),
        ]);
    }
}
