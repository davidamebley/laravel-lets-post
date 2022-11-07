<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function likedBy(User $user){
        // Using the relationship b/n Post and Like, find if the likes a post has contains any user id being checked
        return $this->likes->contains('user_id', $user->id);
    }

    public function ownedBy(User $user){
        // Using the relationship b/n Post and User, find if the post belongs to current user
        return $user->id === $this->user_id;
    }

    /** Get the user that owns the Post
     *
     */
    // Create an Eloquent relationship between post and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Create an Eloquent relationship between post and Like
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
