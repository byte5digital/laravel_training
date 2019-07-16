<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TaskRepositoryInterface;
use App\Http\Requests\TaskRequest;
use App\Task;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected $taskRepository;

    /**
     * TaskController constructor.
     * @param $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $tasks = Task::from('task_mwege')->get();
        $tasks = $this->taskRepository->getAllTasks();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('id')) {
            $task = $this->taskRepository->getOrNew($request->input('id'));
        } else {
            $task = $this->taskRepository->getOrNew(0);
        }

        if ($task instanceof Task) {
            $task->name = $request->input('name');
            $task->description = $request->input('description');
            $task->project_id = 4;
            $this->taskRepository->store($task);
            return back();
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public
    function show(
        int $id
    ) {
        $currentTask = $this->taskRepository->getTaskById($id);
        return view('tasks.detail', ['task' => $currentTask]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public
    function edit(
        Task $task
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskRequest $request
     * @param \Validator $validator
     * @return \Illuminate\Http\Response
     */
    public
    function update(
        Request $request
    ) {
        $task = Task::firstOrNew(['id' => $request->input('id')]);
        if ($task instanceof Task) {
            $task->name = $request->input('name');
            $task->description = $request->input('description');
            $this->taskRepository->store($task);
            return back();
        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(
        Task $task
    ) {
        //
    }
}
