<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    private Project $projectModel;

    public function __construct()
    {
        $this->projectModel = new Project;
    }

    public function findAll()
    {
        return $this->projectModel->paginate(1);
    }
}
