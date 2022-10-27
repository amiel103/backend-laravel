<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\PostController;
class PostTest extends TestCase
{
    public function test_test_home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // $this->assertTrue(true);
    }

    public function test_create_post()
    {
        $response = $this->post('api/createPost', [
          'post'=>'hello',
          'author'=>'amiel',
          'email'=>'aaa@222.com'
        ]);
        $response->assertStatus(200);
        $this->assertEquals( "post created" , $response->getContent() );
    }

    public function test_delete_post()
    {
        $response = $this->post('api/deletePost', [
          'post'=>'hello',
          'author'=>'amiel',
        ]);
        $response->assertStatus(200);
        $this->assertEquals( "post deleted" , $response->getContent() );
    }

    public function test_get_post()
    {
        $response = $this->get('api/getPost');
        $response->assertStatus(200);
      
    }

     
}
