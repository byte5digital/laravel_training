<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    protected $mockProject;
    protected $tempName;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockProject = factory(Project::class)->make();
        $this->mockProject->save();
        $this->tempName = $this->mockProject->name;
    }

    public function testProjectApiControllerTest()
    {
        $response = $this->get('/api/projects');
        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => [['id', 'user' => [], 'project_name']]]);
        $response->assertJson(['data' => [['project_name' => $this->tempName]]]);
    }

    public function testAddDataToProjectTest()
    {
        $allProjects = Project::all();
        $this->assertEquals($allProjects->count(), 1);
        $this->assertEquals($allProjects->first()->name, $this->tempName);
    }
}
