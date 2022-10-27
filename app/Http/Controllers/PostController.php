<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function getPostOf(Request $request)
    {
      try {
        $post = Post::where( 'email' ,'=', $request->email )->get();
        return $post;
      }
      
      catch (customException $e) {
        return $e->errorMessage();
      }
    }

    public function getPost()
    {
      try {
        $post = Post::all();
        return $post;
      }
      
      catch (customException $e) {
        return $e->errorMessage();
      }
    }
    
    public function create( Request $request )
    {
      try {
              
        $post = new Post();
        $post->post = $request->post;
        $post->author = $request->author;
        $post->email = $request->email;
        $post->likes = 0;
        
        $result = $post->save();


        return "post created";
      }
      
      catch (customException $e) {
        return $e->errorMessage();
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
