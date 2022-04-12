<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    public function __construct(
        private ProjectRepository $projectRepository = new ProjectRepository
    ) {
    }

    public function findAll()
    {
        return $this->projectRepository->findAll();
    }

    public function findOne($id)
    {
        return $this->projectRepository->findOne($id);
    }

    public function create($request)
    {
        return $this->projectRepository->create($request);
    }

    public function update($id, $data)
    {
        return $this->projectRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->projectRepository->delete($id);
    }
}
