<?php

namespace App\Http\Controllers\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use Exception;
use Illuminate\Support\Facades\Log;
class ReplyController extends Controller
{
    public function PostReply(Request $request)
    {
        try {
            $request->validate([
                'reply' => 'required'
            ]);
            $data = $request->all();
            $comment = Comment::FindOrFail($data['comment_id']);
            $input = $comment->reply_comments()->create([
                'reply' => $request->reply,
                'name' => auth()->user()->name,
                'user_id' => auth()->user()->id,
            ]);
            return response([
                'data'=> $input
            ],200);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
    public function getReply($id){
        $reply = Comment::with('reply_comments')->FindOrfail($id);
        return response([
            'reply' => $reply
        ],200);
    }
}
