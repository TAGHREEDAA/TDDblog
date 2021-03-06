<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    // comment creator relation
    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
