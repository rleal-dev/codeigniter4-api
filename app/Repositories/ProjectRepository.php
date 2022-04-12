<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function __construct(
        private Project $projectModel = new Project
    ) {
    }

    public function findAll()
    {
        return $this->projectModel->findAll();
    }

    public function findOne($id)
    {
        return $this->projectModel->find($id);
    }

    public function create($request)
    {
        return $this->projectModel->save($request->getPost());
    }

    public function update($id, $request)
    {
        return $this->projectModel->update($id, $request->getPost());
    }

    public function delete($id)
    {
        return $this->projectModel->delete($id);
    }
}
