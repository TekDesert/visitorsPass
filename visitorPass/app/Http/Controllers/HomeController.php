<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class HomeController extends Controller
{
    public function __construct(){
        //$this->middleware(["auth"])
        $this->middleware(["auth"]);
    }

    public function index(){
        return view('dashboard');
    }
    public function meeting(){
        return view('meeting');
    }
    public function meetingPost(Request $request){
        $this->validate($request, [
            'nature' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'type' => 'required',
            'company' => 'required_if:type,company',
            'person' => 'required_if:type,company',
            'number' => 'required_if:type,company',
            'others' => 'required_if:type,company',

        ]);

          $Meeting = Meeting::create([
            'natureofvisit' => $request->nature,
            'date' => $request->date,
            'starttime' => $request->start,
            'endtime' => $request->end,
            'type' => $request->type,
            'companyname' => $request->company,
            'personname' => $request->person,
            'mobilenumber' => $request->number,
            'otherpeople' => $request->others,
            'imageprofile' => 'default.png',
          ]);


           if($Meeting){

               if( $request->file('picture')){ //If there was an image uploaded

                   $file_name = $request->file('picture')->getClientOriginalName();

                   //dd($file_name);

                   $size = sizeof(explode(".", $file_name)); //Get number of seperation with points (like hello.2.jpg would have 3 seperation while hello.jpg would have 2)
                   $fileExtension = explode(".", $file_name)[ $size - 1 ]; //Get the last dot seperation which is logically the file extension
                   //dd($fileExtension);


                   $finalFileName =  auth()->user()->id . "." . $fileExtension; //the file name is "the id of the user + the extension of the file"

                   $request->file('picture')->storeAs('profiles', $finalFileName , 'userPictures'); //The stored path is in 'config/filesystems.php' and is named 'mylocal';


                   $Meeting->imageprofile = $finalFileName;

               }
               else{
                   $Meeting->imageprofile = 'default.jpg';
               }

               $Meeting->save();

               return redirect()->route('meeting')->with('status', 'Meeting created successfully');

          }
          else {
            return back()->with('status', 'Error when creating Meeting');
          }
    }

    public function admin(){
        $meetings = Meeting::paginate(1);
        foreach($meetings as $items){
            return view('admin', ['meetings'=>$meetings]);
        }

    }
}
