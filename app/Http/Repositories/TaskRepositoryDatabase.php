<?php


namespace App\Http\Repositories;


use App\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TaskRepositoryDatabase implements TaskRepositoryInterface
{

    /**
     * @param string $tablename
     * @return Task[]|Collection
     */
    public function getAllTasks(string $tablename = "tasks")
    {
       return Task::from($tablename)->get();
    }

    public function getTaskById(int $id)
    {
        return Task::whereId($id)->first();
    }

    public function store(Task $task){
        return $task->save();
    }

    /**
     * @param int $id
     * @param Task $task
     * @return Task|Builder|null ?Task
     */
    public function updateTask(int $id, Task $task)
    {
        $taskToUpdate = Task::whereId($id)->first();
        if ($taskToUpdate instanceof Task){
            $taskToUpdate->name = $task->name;
            $taskToUpdate->description = $task->description;
            $taskToUpdate->user_id = $task->user_id;
            $taskToUpdate->save();
            return $taskToUpdate;
        }
        return null;
    }

    public function createTask(Task $task)
    {
        return Task::create($task);
    }

    public function deleteTask(int $id)
    {
        $taskToDelete = Task::whereId($id)->first();
        if ($taskToDelete instanceof Task){
            try {
                $taskToDelete->delete();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }

    public function getOrNew(int $id)
    {
        return Task::firstOrNew(['id' => $id]);
    }
}