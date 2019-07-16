<?php


namespace App\Http\Repositories;


use App\SubTask;

interface SubTaskRepositoryInterface
{

    public function getAllSubTasks();

    public function getSubTaskById(int $id);

    public function updateSubTask(int $id, SubTask $subTask);

    public function createSubTask(SubTask $subTask);

    public function deleteSubTask(int $id);
}