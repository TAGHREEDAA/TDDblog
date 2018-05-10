<?php
/**
 * Created by PhpStorm.
 * User: taghreed
 * Date: 2/21/18
 * Time: 3:14 AM
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Blog Posts</div>

                    <div class="card-body">
                        @foreach($posts as $post)
                            <article>
                                <h3><a href="/blog/{{$post->id}}">{{$post->title}}</a></h3>
                                <div class="body">{{$post->body}}</div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
