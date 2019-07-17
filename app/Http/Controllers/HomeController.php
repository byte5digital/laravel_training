<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProjectRepositoryInterface;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $projectRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->middleware('auth');
        $this->projectRepository = $projectRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = ProjectResource::collection($this->projectRepository->getAllProjects());
        return view('home', ['projects' => $projects]);
    }
}
