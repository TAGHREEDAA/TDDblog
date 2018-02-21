<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * User story: a post can add comments
     * //Giving a Post
     * // Add a comment
     * // Then post should have a comment
     *
     */
    public function testPostAddComment()
    {
        //Giving a Post
        $post = factory('App\Post')->create();
        // Add a comment
        $post->storeComment([
            'body'=>'Testing',
            'user_id'=>1
        ]);
        // Then post should have comment
        $this->assertCount(1,$post->comments);
    }


    /**
     * User story: Post should have a creator user
     * // Giving post
     * // expect found User who create post
     */
    function testPostCreator()
    {
        // Giving post
        $post = factory('App\Post')->create();

        // expect found User who create post
        $this->assertInstanceOf('App\User', $post->creator);

    }
}
