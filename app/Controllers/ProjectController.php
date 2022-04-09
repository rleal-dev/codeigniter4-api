<?php

namespace App\Controllers;

use App\Services\ProjectService;
use CodeIgniter\RESTful\ResourceController;

class ProjectController extends ResourceController
{
    /**
     * @var ProjectService
     */
    private ProjectService $projectService;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->projectService = new ProjectService;
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
