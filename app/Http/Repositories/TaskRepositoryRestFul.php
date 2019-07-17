<?php


namespace App\Http\Repositories;


use App\Task;
use App\TestTaskFromWs;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class TaskRepositoryRestFul implements TaskRepositoryInterface
{

    protected $guzzleHttp;

    public function __construct()
    {
        $this->guzzleHttp = new Client();
    }


    public function getOrNew(int $id)
    {
        // TODO: Implement getOrNew() method.
    }

    public function getAllTasks(string $tablename = "tasks")
    {
        try {

            $response = $this->guzzleHttp->get('https://jsonplaceholder.typicode.com/todos');

            if ($response->getStatusCode() === 200){
                $tasksFromWebservice = json_decode($response->getBody(), true);
                $entityArray = [];
                foreach ($tasksFromWebservice as $wsTask){
                    $entityArray[] = new TestTaskFromWs($wsTask);
                }
                return $entityArray;
            }
        } catch (GuzzleException $e) {
        }
    }

    public function getTaskById(int $id)
    {
        // TODO: Implement getTaskById() method.
    }

    public function updateTask(int $id, Task $task)
    {
        // TODO: Implement updateTask() method.
    }

    public function createTask(Task $task)
    {
        // TODO: Implement createTask() method.
    }

    public function deleteTask(int $id)
    {
        // TODO: Implement deleteTask() method.
    }

    public function store(Task $task)
    {
        // TODO: Implement store() method.
    }
}