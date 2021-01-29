<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function getComment()
    {
        return $data = [
            'body' => $this->body,
            'title' => $this->title,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'parent_id' => $this->parent_id,
            'reply' => $this->reply,
            'name' => $this->name,
            'comment_id' => $this->comment_id,
        ];
    }

    public function toArray($request)
    {
        return [
            'body' => $this->body,
            'user_id' => auth()->user()->id   
        ];
    }


}