<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostResource extends Resource
{
    public function postReply($request)
    {
        return [
            'reply' => $this->reply,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'comment_id' => $this->comment_id,
        ];
    }
    public function getReply($id)
    {
        return $reply = [
            'id' => $this->id,
            'reply' => $this->reply,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'comment_id' => $this->comment_id,
        ];
        
    }
}