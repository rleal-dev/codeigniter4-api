<?php

namespace App\Controllers;

use App\Services\UserService;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->userService = new UserService;
    }

    public function index()
    {
    }

    public function show($id = null)
    {
    }

    public function store()
    {
    }

    public function update($id = null)
    {
    }

    public function delete($id = null)
    {
    }
}
