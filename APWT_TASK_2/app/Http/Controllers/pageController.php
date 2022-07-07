<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function services(){
        return view('services');
    }

    public function about() {
         $doctor=array(
            'Name'=>'Adhir Islam',
            'Speciality'=>'Gynocologist'

        );

        $doctor1=array(
            'Name'=>'Ashraful Islam',
            'Speciality'=>'Psychologist'

        );
        return view('about')->with('doctor',$doctor)->with('doctor1',$doctor1);
    }

    public function department(){
        return view('departments');
    }

    public function register(){
        return view('registration');
    }

    public function submitted(Request $request){

        $request->validate([
            'username'=>'required|alpha_num',
            'mail'=>'required|email:rfc,dns',
            'pass'=>'required|alpha_num'

        ],
        [
            'username.required'=>"Username cannot be Empty",
            'username.alpha_num'=>"Username should be alpha numeric",
            'mail.required'=>"Email is required"
        ]
    );

        $username=$request->username;
        $mail=$request->mail;

        return view('formSubmitted')->with('username', $username)->with('mail', $mail);

    }
}
