<?php
/**
 * Created by PhpStorm.
 * User: taghreed
 * Date: 2/21/18
 * Time: 4:05 AM
 */?>


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
                    <div class="card-header"><h1>{{$post->title}}</h1>
                    Post By: <a href="#"><h4>{{$post->creator->name}}</h4></a></div>

                    <div class="card-body">
                            <article>
                                <div class="card-body">{{$post->body}}</div>
                            </article>
                        @if (auth()->check())
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    <form method="POST" action="{{ route('add-comment',$post->id) }}">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-default">Post</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to comment in post.</p>
                        @endif

                        <div class="row">
                            <div class="col-md-11 col-md-offset-1">
                                @foreach($post->comments as $comment)
                                    <div class="card card-default">
                                        <div class="card-header">{{ $comment->creator->name }} comment since
                                             {{$comment->created_at->diffForHumans()}}</div>
                                        <div class="card-body">
                                            <article>
                                                <div class="card-body">{{ $comment->body }}</div>
                                            </article>
                                        </div>
                                    </div>˛
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

