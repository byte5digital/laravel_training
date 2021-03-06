<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /* @var \App\Project $this */
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'project_name' => $this->name
        ];
    }
}
