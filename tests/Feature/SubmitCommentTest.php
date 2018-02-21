<?php
/**
 * Submit Comment Test Feature Test
 * 1- create route for connect to endpoint
 * 2- create and save comment object to DB
 * 3- check comment are exist in show page
 */


namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmitCommentTest extends TestCase
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
     * test_user_can_submit_comment(){
     *  // Given a Guest
     * // make guest to Authenticate user
     * // And Post is exist
     * // And Giving comment object
     * // When the user submit comment to the post
     * // Then their should see comment
    */
    public function testUserSubmitComment(){
        // Given a Guest
        $guest = factory('App\User')->create();

        // create Authenticate user
        $user = $this->be($guest);

        // And Post is exist
        $post = factory('App\Post')->create();

        // And Giving comment object
        $comment = factory('App\Comment')->make();

        // When the user submit comment to the post
        $this->post('/blog/'.$post->id.'/comment',$comment->toArray());

        // Then their should see comment
        $this->get('/blog/'.$post->id)->assertSee($comment->body);

    }


    /**
     * User story: guest can not submit comment
     * // Given a Guest
     * // And Post is exist
     * // And Giving comment object
     * // When the user submit comment to the post
     * // Then their should don't see comment
     */
    function test_guest_can_not_submit_comment(){
        // Given a Guest
        $guest = factory('App\User')->create();

        // And Post is exist
        $post = factory('App\Post')->create();

        // And Giving comment object
        $comment = factory('App\Comment')->make();

        // When the user submit comment to the post
        $this->post('/blog/'.$post->id.'/comment',$comment->toArray());

        // Then their should don't see comment
        $this->get('/blog/'.$post->id)->assertDontSee($comment->body);

    }
}
