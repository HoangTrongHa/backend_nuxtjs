<?php

namespace App\Http\Controllers\News;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
class PostController extends Controller
{
   
    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        $posts = Post::create($request->all());
        return response([
            'data' => $posts
        ], 200);
    }
    public function getPost()
    {
        $posts = Post::get();
        return response([
            'data'=> $posts
        ],200);
    }
    public function details($id){
        $posts = Post::with(['comments'])->findOrFail($id);
        return response([
            'details'=> $posts
        ],200);
    }
}
