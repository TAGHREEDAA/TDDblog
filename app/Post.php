<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // post comments relation
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function storeComment($comment){
        $this->comments()->create($comment);
    }

    public function creator(){
        return $this->belongsTo(User::class,'user_id');
    }
}
