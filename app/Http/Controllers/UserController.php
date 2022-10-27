<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Hash;
use DB;

class UserController extends Controller
{
    
    public function index()
    {
        return "yawa";
    }
    

    public function create(Request $request ){
      
      try {
        $user = User::where( 'email' ,'=', $request->email )->first();

        if( $user ){
          return "email already used";
        }

        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password );
        $result = $user->save();


        return "user created";
      }
      
      catch (customException $e) {
        return $e->errorMessage();
      }
    }


    public function login(Request $request){
      try {

        $user = User::where( 'email' ,'=', $request->email )->first();
        
        // if not user
        if( !$user ){
          return "user not found";
        }

        //if password doesn't match
        if( !Hash::check( $request->password , $user->password ) ){
          return "password doesn't match";
        }
        
        return $user;

      }
      
      catch (customException $e) {
        return $e->errorMessage();
      }

    }

    public function delete(Request $request){
      try {

        $user = User::where( 'email' ,'=', $request->email )->first();
        
        // if not user
        if( !$user ){
          return "user not found";
        }

        $user->delete();
        
        return true;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
