<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthentificationController extends Controller
{

    public function loginUser(Request $request){

        //0- READING POST PARAMETERS
        $email = $request->get('email');
        $password = $request->get('password');

        //1- INPUT VALIDATION
        $this->validate($request, [
            'email' => 'required|email', // If there is an error, it will display @error messages
            'password' => 'required'
        ]);



        //Check user credentials
        if( !auth()->attempt($request->only('email', 'password') )){ //remember is the name of the "remember me" checkbox



            return back()->with('status', 'Error - Wrong username and/or password'); //Return back to login page


        }

        //2- REDIRECT USERS
        return redirect()->route('dashboard');

    }


    public function logout(){
        auth()->logout();
        return redirect()->route('index');
    }

}
