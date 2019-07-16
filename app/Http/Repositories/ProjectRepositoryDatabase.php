<?php


namespace App\Http\Repositories;


use App\Project;
use Auth;

class ProjectRepositoryDatabase implements ProjectRepositoryInterface
{

    public function getAllProjects()
    {
        return Project::all();
    }

    public function getProjectById(int $id)
    {
       return Project::whereId($id)->first();
    }

    public function updateProjectById(int $id, Project $project)
    {
        $projectToUpdate = Project::whereId($id)->first();
        if ($projectToUpdate instanceof Project){
            $projectToUpdate->name = $project->name;
            $projectToUpdate->user_id = $project->user_id;
            $projectToUpdate->save();
            return $projectToUpdate;
        }
        return null;
    }

    public function createProject(Project $project)
    {
        $newProject = new Project();
        $newProject->name = $project->name;
        $newProject->user_id = $project->user_id;
        $newProject->save();
        return $newProject;
    }

    public function deleteProject(int $id)
    {
        $projectToDelete = Project::whereId($id)->first();
        if ($projectToDelete instanceof Project){
            try {
                $projectToDelete->delete();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }

    public function getAllProjectFromLoggedInUser()
    {
        return Auth::user()->projects;
    }
}