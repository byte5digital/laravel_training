<?php


namespace App\Http\Repositories;


use App\Project;

class ProjectRepositoryMySql implements ProjectRepositoryInterface
{

    public function getAllProjects()
    {
        return Project::all();
    }

    public function getProjectById(int $id)
    {
        // TODO: Implement getProjectById() method.
    }

    public function updateProjectById(int $id, Project $project)
    {
        // TODO: Implement updateProjectById() method.
    }

    public function createProject(Project $project)
    {
        // TODO: Implement createProject() method.
    }

    public function deleteProject(int $id)
    {
        // TODO: Implement deleteProject() method.
    }
}