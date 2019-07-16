<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProjectRepositoryInterface;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Project;

class ProjectController extends Controller
{

    protected $projectRepository;

    /**
     * ProjectController constructor.
     * @param $projectRepository
     */
    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $projects = $this->projectRepository->getAllProjects();
        return view('projects.index', ['projects' => $projects]);
    }

    public function indexById(\Request $request, int $id)
    {
        $currentProject = $this->projectRepository->getProjectById($id);
        return view('projects.detail', ['project' => $currentProject]);
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
     * @return ProjectResource
     */
    public function store(ProjectRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     * @return ProjectResource
     */
    public function update(ProjectRequest $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Request $request
     * @param int $projectId
     * @return bool
     * @throws \Exception
     */
    public function destroy(\Request $request, int $projectId)
    {
        $this->projectRepository->deleteProject($projectId);
        return redirect(route('project.index'));
    }
}
