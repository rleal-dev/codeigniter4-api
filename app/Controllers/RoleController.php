<?php

namespace App\Controllers;

use App\Services\RoleService;
use CodeIgniter\RESTful\ResourceController;

class RoleController extends ResourceController
{
    /**
     * @var RoleService
     */
    private RoleService $roleService;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->roleService = new RoleService;
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
