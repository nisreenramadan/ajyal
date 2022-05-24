<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LecturesResource extends JsonResource
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
            'id' => $this->id,
            'title'=>$this->title,
            'sort'=>$this->sort,
            'description' => $this->description,
            'video' => $this->getFirstMediaUrl('videos'),
            // 'finished_lecture' => FinishedLectureResource::collection($this->finishedLecture)
        ];
    }
}
