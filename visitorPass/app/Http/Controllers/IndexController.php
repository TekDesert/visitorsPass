<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class IndexController extends Controller
{
    //

    public function index(){
        //$this->middleware([checkConnectedUser]); //Pour appeler un middleware sur une methode précise
        return view('login');
    }

    public function Register(){
        //$this->middleware([checkConnectedUser]); //Pour appeler un middleware sur une methode précise
        return view('register');
    }

    public function registerUser(Request $request){

         //0- READING POST PARAMETERS
         $firstName = $request->get('Fname');
         $lastName = $request->get('Lname');
         $email = $request->get('email');
         $password = $request->get('password');
         $confirmPassword = $request->get('password_confirmation');

         //1- INPUT VALIDATION

         $this->validate($request, [
             'Fname' => 'required', // If there is an error, it will display @error messages
             'Lname' => 'required',
             'email' => 'required|email',
             'password' => 'required|confirmed' //Performs the password confirmation if the second input of password confirmation name is "password_confirmation"
         ]);




         //if ($password == $confirmPassword){


           $user = User::create([
                'name' => $firstName . ' ' . $lastName,
               'email' => $email,
               'userpicture' => 'default.jpg',
               "password" => Hash::make($password),

           ]);


            if($user){

                auth()->attempt($request->only('email', 'password'));

                if( $request->file('picture')){ //If there was an image uploaded

                    $file_name = $request->file('picture')->getClientOriginalName();

                    //dd($file_name);

                    $size = sizeof(explode(".", $file_name)); //Get number of seperation with points (like hello.2.jpg would have 3 seperation while hello.jpg would have 2)
                    $fileExtension = explode(".", $file_name)[ $size - 1 ]; //Get the last dot seperation which is logically the file extension
                    //dd($fileExtension);


                    $finalFileName =  auth()->user()->id . "." . $fileExtension; //the file name is "the id of the user + the extension of the file"

                    $request->file('picture')->storeAs('profiles', $finalFileName , 'userPictures'); //The stored path is in 'config/filesystems.php' and is named 'mylocal';


                    $user->userpicture = $finalFileName;

                }
                else{
                    $user->userpicture = 'default.jpg';
                }

                $user->save();

                return redirect()->route('dashboard');

           }
           else {
             return back()->with('status', 'Error when creating User');
           }


    }



}
