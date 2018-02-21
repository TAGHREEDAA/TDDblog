<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

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
     * User story: Test if auth user can create post
     * // Given a Guest
     * // make a guest become User
     * // And Giving Post object
     * // When the user create Post
     * // When their visit
     * //Then their should see post
     */
    public function testUserCreatePost(){
        $this->withoutExceptionHandling();

        // Given a Guest
        $guest = factory('App\User')->create();

        // make a guest become User
        $user = $this->be($guest);

        // And Giving Post object
        $post = factory('App\Post')->make();

        // When the user create Post
        $this->post('/post/'.$post->id,$post->toArray());

        // When their visit
        $response = $this->get('/blog/'.$post->id);

        //The assertSee method is on the TestResponse class, not on the base TestCase class
        //Then their should see post
        //$this->assertSee($post->title); // not working

        $response->assertSee($post->title);

    }


    /**
     * User story: guest user can not create post
     * // Given a Guest
     * // And Giving Post object
     * // When the user create Post
     * // // expect thrown exception
     */
    public function testGuestNotCreatePost(){

        $this->withoutExceptionHandling();

        // expect thrown exception
        $this->expectException('Illuminate\Auth\AuthenticationException');

        // Given a Guest
        $guest = factory('App\User')->create();

        // And Giving Post object
        $post = factory('App\Post')->make();

        // When the user create Post
        $this->post('/post/'.$post->id,$post->toArray());

    }


    /**
     * User story: a guest can not access create post page
     *
     */
    public function testGuestNotAccessCreatePost(){
        $this->get('/post/create')
            ->assertRedirect('/login');
    }
}
