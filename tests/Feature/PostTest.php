<?php

namespace Tests\Feature;

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
     * Make sure blog homepage can be accessed
     *
     * @return void
     */
    public function testItFetchesPosts()
    {

        $response = $this->get('/blog'); //make GET access to blog route

        //dd($response);
        $response->assertStatus(200); //assert http status return is 200
    }


    /**
     * User story: we need to see post title appear after create
     * // Giving post object
     * // When guest access blog url
     * // Then I've see blog title that create before
     *
     */
    public function testAccessBlogIndex()
    {   // Giving post object
        $post = factory('App\Post')->create();//create post data
        // When guest access blog url
        $response = $this->get('/blog'); //visit blog homepage
        // Then I've see blog title that create before
        $response->assertSee($post->title); // expect to see post
    }

    /**
     * User story: we need to see a single post
     * // giving post data
     * // when guest access blog/{id}
     * // expect to see post title
     */
    public function testSeeSinglePost(){
        // giving post data
        $post = factory('App\Post')->create();
        // when guest access blog/{id}
        $response = $this->get('/blog/'.$post->id);
        // expect to see post title
        $response->assertSee($post->title);
    }

    /**
     * User story: we need to see a comments when open post
     * // Given a Post
     * // and Post have comments
     * // then I visit single post page
     * // I’ve to see the comment
     *
     */
    public function testSeePostComments(){
        // Given a Post
        $post = factory('App\Post')->create();
        // and Post have comments
        $comment = factory('App\Comment')
            ->create(['post_id'=>$post->id]);
        // then I visit single post page
        $response = $this->get('blog/'.$post->id);
        // I’ve see the comment
        $response->assertSee($comment->body);
    }
}

