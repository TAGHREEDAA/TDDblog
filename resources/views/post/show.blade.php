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
                    <div class="card-header"><h1>{{$post->title}}</h1></div>

                    <div class="card-body">
                            <article>
                                <div class="card-body">{{$post->body}}</div>
                            </article>
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

