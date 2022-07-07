<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellerRequest  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }




    public function register(){
        return view('Seller.register');
    }

    public function registerSubmit(Request $req){

        $req->validate([
            'username' =>'required|max:10|alpha_dash',
            'pass'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
            'contact'=>'required|numeric',
            'gender'=>'required|alpha',
        ]);

        $email=$req->mail;
        $name=$req->name;
        $gender=$req->gender;
        $contact=$req->contact;

        return view('Seller.registerSubmitted')->with('email',$email)
        ->with('name',$name)->with('gender',$gender)->with('contact',$contact);

    }

    public function login(){
        return view('Seller.login');
    }

    public function dashboard(Request $req){

        $cred=array(
            'uname'=>'adhir_12',
            'pass'=>'ad111'
        );

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $uname=$req->username;
        $password=$req->pass;

        if($uname==$cred['uname'] && $password==$cred['pass']){
            return view('Seller.dashboard')->with('uname',$uname);
        }else{
            return back();
        }
    }

    public function logout(){
        return view('Seller.login');
    }

}
