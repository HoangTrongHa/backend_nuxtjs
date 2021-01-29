<?php

namespace App\Http\Controllers\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Post;
use Exception;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function getComment($id){
        $comment = Post::with('comments')->findOrFail($id);
        return response([
            'data' => $comment
        ],200);
    }
    public function comment(Request $req) {
        try {
            $req->validate([
                'body' => 'required'
            ]);
            $data = $req->all();
            $post = Post::FindOrFail($data['post_id']);
            $input = $post->comments()->create([
                'body' => $data['body'],
                'user_id' => auth()->user()->id,
            ]);
            return response([
                'data'=> $input
            ],200);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
