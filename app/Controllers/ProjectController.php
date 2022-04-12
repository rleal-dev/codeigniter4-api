<?php

namespace App\Controllers;

use App\Resources\{ProjectCollection, ProjectResource};
use App\Services\ProjectService;
use App\Validations\ProjectValidation;
use CodeIgniter\RESTful\ResourceController;
use Throwable;

class ProjectController extends ResourceController
{
    public function __construct(
        private ProjectService $projectService = new ProjectService
    ) {
    }

    public function index()
    {
        $projects = $this->projectService->findAll();

        return $this->respond(new ProjectCollection($projects));
    }

    public function show($id = null)
    {
        $project = $this->projectService->findOne($id);
        if (! $project) {
            return $this->failNotFound('Project not found!');
        }

        return $this->respond([
            'data' => new ProjectResource($project),
        ]);
    }

    public function create()
    {
        if (! $this->validate(ProjectValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->projectService->create($this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on create project!');
        }

        return $this->respond([
            'message' => 'Project created successfully!',
        ]);
    }

    public function update($id = null)
    {
        if (! $this->validate(ProjectValidation::rules())) {
            return $this->fail([
                'errors' => $this->validator->getErrors(),
            ]);
        }

        try {
            $this->projectService->update($id, $this->request);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on update project!');
        }

        return $this->respond([
            'message' => 'Project updated successfully!',
        ]);
    }

    public function delete($id = null)
    {
        try {
            $this->projectService->delete($id);
        } catch (Throwable $exception) {
            if (is_development()) {
                throw new $exception;
            }

            return $this->failServerError('Error on delete project!');
        }

        return $this->respond([
            'message' => 'Project deleted successfully!',
        ]);
    }
}
