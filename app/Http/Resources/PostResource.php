<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'created_at'=>$this->created_at,
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'teacher_id'=> $this->teacher->user->name,
            'images'=>$this->getFirstMediaUrl('images'),
            'comments' => CommentsResource::collection($this->comments),
            'likes' => LikesResource::collection($this->likes)
        ];
    }
}
