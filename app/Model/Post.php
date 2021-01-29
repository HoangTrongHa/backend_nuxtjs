<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //xóa
    use SoftDeletes;
    
    protected $fillable = ['title', 'body'];
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id')->whereNull('parent_id');
    }
}
