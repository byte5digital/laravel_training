<?php


namespace App\Http\Repositories;


use App\Task;

interface TaskRepositoryInterface
{
    public function getOrNew(int $id);

    public function getAllTasks(string $tablename = "tasks");

    public function getTaskById(int $id);

    public function updateTask(int $id, Task $task);

    public function createTask(Task $task);

    public function deleteTask(int $id);

    public function store(Task $task);
}