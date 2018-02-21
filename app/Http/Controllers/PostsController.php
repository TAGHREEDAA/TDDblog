<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     *  View posts on the
     */
    public function index(Post $post){ // inject Post Model
        // query sort by created_at desc

        $posts = $post::latest()->get();
        // bind query result to view
        return view('post.index')->with(['posts'=>$posts]);
    }

    /**
     * Show single post
     */
    public function show(Post $post){
        return view('post.show')->with(['post'=>$post]);
    }


}
