<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Hash;
use App\User;

class UserController extends Controller
{
    public function store()
    {      
        //return response()->json(request());
       
        /*$this->validate(request(), [
            'firstname' => 'required|Min:2|Max:80',
            'lastname' => 'required|Min:2|Max:80',
            'email' => 'required|email|Between:3,60|unique:users',
            'username' => 'required|AlphaNum|unique:users|Min:6|Max:80',
            'password' => 'required|AlphaNum|confirmed|Min:8|Max:66',
        ]);*/

        if(User::where('username',request('username'))->first()){
            return response()->json("username is unavailable",200);
        }
        if(User::where('email',request('email'))->first()){
            return response()->json("email is unavailable",200);
        }

        $user = User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
           
        ]);



        if($user){
            

            return response()->json($user,201);

        }
        
       

        abort(403, 'Failed in creating user.'); 
    }

    public function get(){

        $users = User::all();

        return response()->json($users);

    }

    public function getspecific(Request $requests){

        $users = User::find($requests->id);

        return response()->json($users);

    }

    public function delete(Request $request){
        if(request('username')){
            $user = User::where('username',request('username'));
            $user->delete();

            return response()->json("deleted",200);
        }
        else if (request('id')){
            $user = User::where('id',request('id'));
            $user->delete();

            return response()->json("deleted",200);
        }
        
        abort(403, 'Failed in deleting user.'); 
    }


}





