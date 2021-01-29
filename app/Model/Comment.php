<?php
  
namespace App\Model;
  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
  
class Comment extends Model
{
    use SoftDeletes;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];
   
    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function reply_comments()
    {
        return $this->hasMany(Reply::class, 'comment_id');
    }

    
    public function Post(){
        return $this->belongsTo( Post::class,'post_id');
    }
}
