<?php


namespace App\Http\Repositories;


use App\Project;

interface ProjectRepositoryInterface
{
    public function getAllProjects();
    public function getProjectById(int $id);
    public function updateProjectById(int $id, Project $project);
    public function createProject(Project $project);
    public function deleteProject(int $id);
}