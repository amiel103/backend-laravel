<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
class UserTest extends TestCase
{
    public function test_test_home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // $this->assertTrue(true);
    }

    public function test_create_user()
    {
        $response = $this->post('api/createUser', [
          'name'=>'aaamiel',
          'email'=>'123@123.com',
          'password'=>'123123'
        ]);
        // $response->assertStatus(200);
        $this->assertEquals( "user created" , $response->getContent() );
    }

    public function test_create_user_duplicate()
    {
        $response = $this->post('api/createUser', [
          'name'=>'aaamiel',
          'email'=>'123@123.com',
          'password'=>'123123'
        ]);
        // $response->assertStatus(200);
        $this->assertEquals( "email already used" , $response->getContent() );
    }



    public function test_login_correct_credentials()
    {
        $response = $this->post('api/login', [
          'email'=>'123@123.com',
          'password'=>'123123'
        ]);
        $response->assertStatus(200);
    }

    public function test_login_wrong_password()
    {
        $response = $this->post('api/login', [
          'email'=>'123@123.com',
          'password'=>'123123q'
        ]);
        $response->assertStatus(200);
        $this->assertEquals( "password doesn't match" , $response->getContent() );
    }

    public function test_login_wrong_user()
    {
        $response = $this->post('api/login', [
          'email'=>'123@1231.com',
          'password'=>'123123q'
        ]);
        $response->assertStatus(200);
        $this->assertEquals( 'user not found' , $response->getContent() );
    }


    public function test_delete_user()
    {
        $response = $this->post('api/deleteUser', [
          'name'=>'aaamiel',
          'email'=>'123@123.com',
          'password'=>'123123'
        ]);
        $response->assertStatus(200);
        $this->assertEquals( "1" , $response->getContent() );
    }

    public function test_delete_user_notFound()
    {
        $response = $this->post('api/deleteUser', [
          'name'=>'aaamiel',
          'email'=>'notfound@notfound.com',
          'password'=>'123123'
        ]);
        $response->assertStatus(200);
        $this->assertEquals( "user not found" , $response->getContent() );
    }

    


}
