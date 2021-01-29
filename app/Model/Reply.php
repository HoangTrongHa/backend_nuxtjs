<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Reply extends Model
{
    protected $table = 'reply_comments';

    protected $fillable = ['comment_id', 'name', 'reply','user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function Comment()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }
}
