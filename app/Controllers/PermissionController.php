<?php

namespace App\Controllers;

use App\Services\PermissionService;
use CodeIgniter\RESTful\ResourceController;

class PermissionController extends ResourceController
{
    /**
     * @var PermissionService
     */
    private PermissionService $permissionService;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->permissionService = new PermissionService;
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
