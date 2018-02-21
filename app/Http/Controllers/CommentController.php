<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function _construct(){
        $this->middleware('auth');
    }
    /**
     * @param Post $post
     * @param Request $request
     *
     */
    public function store(Post $post,Request $request){
        $post->storeComment([
            'body'=>$request->get('body'),
            'user_id'=> auth()->id()
        ]);
    }
}
