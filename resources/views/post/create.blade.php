<?php
/**
 * Created by PhpStorm.
 * User: taghreed
 * Date: 2/21/18
 * Time: 7:03 AM
 */?>



@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h1>Create Post</h1>
                    </div>

                    <div class="card-body">
                        @if (auth()->check())
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    <form method="POST" action="{{ route('add-post') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="Post Title">
                                        </div>

                                        <div class="form-group">
                                            <label for="body">Body</label>
                                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="8"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-default">Submit Post</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to post.</p>
                        @endif
                </div>
            </div>

        </div>
    </div>
@endsection

