<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            // ...
            'finshed_at' => $this->lectures()->latest()->first()->finshed_at,
        ];

        // student badge controller
        auth()->user()->badges

        if ($lecture->isLastLecture())
        \Event::fire(new CourseFinished($course))
    }
}
