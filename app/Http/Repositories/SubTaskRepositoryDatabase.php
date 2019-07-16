<?php


namespace App\Http\Repositories;


use App\SubTask;

class SubTaskRepositoryDatabase implements SubTaskRepositoryInterface
{

    public function getAllSubTasks()
    {
        return SubTask::all();
    }

    public function getSubTaskById(int $id)
    {
        return SubTask::whereId($id)->first();
    }

    public function updateSubTask(int $id, SubTask $subTask)
    {
        $subTaskToUpdate = SubTask::whereId($id)->first();
        if ($subTaskToUpdate instanceof SubTask){
            $subTaskToUpdate->name = $subTask->name;
            $subTaskToUpdate->description = $subTask->description;
            $subTaskToUpdate->user_id = $subTask->user_id;
            $subTaskToUpdate->save();
            return $subTaskToUpdate;
        }
        return null;
    }

    public function createSubTask(SubTask $subTask)
    {
        $newSubTask = new SubTask();
        $newSubTask->name = $subTask->name;
        $newSubTask->description = $subTask->description;
        $newSubTask->user_id = $subTask->user_id;
        $newSubTask->save();

        return $newSubTask;
    }

    public function deleteSubTask(int $id)
    {
        $subTaskToDelete = SubTask::whereId($id)->first();
        if ($subTaskToDelete instanceof SubTask){
            try {
                $subTaskToDelete->delete();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }
}