<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use Illuminate\Http\Request;
use Session;

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
    public function create(Request $req)
    {
        //
        $req->validate([
            'pass'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
        ]);

        $user_id=$this->generateID();


        $seller=new Seller();
        $seller->seller_id=$user_id;
        $seller->seller_name=$req->name;
        $seller->seller_email=$req->mail;
        $seller->seller_pass=$req->pass;
        $seller->save();



        return redirect()->route('register')->with([ 'msg' => "Registration Completed!. Your ID is : ".$user_id ]);

    }

    public function generateID(){

        $seller=Seller::orderBy('seller_id','desc')->first();

        if(empty($seller)){

            $Seller_ID="ASHCS-MS-1";
            return $Seller_ID;
        }
        else{

            $rec=explode('-',$seller->seller_id);
            $new_id=(int)$rec[2];
            $updated_id=$new_id+1;

            $Seller_ID="ASHCS-MS-".str($updated_id);

            return $Seller_ID;

        }


    }

    public function register()
    {
        //
     if(Session::has('msg'))
    {
      $success_msg = session()->get('msg');
      session()->forget('msg');
      return view('Seller.register')->with('msg', $success_msg);
    }
        return view('Seller.register');
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

    public function login(){
        return view('Seller.login');
    }

    public function loginRequest(Request $req){

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->username;
        $password = $req->pass;

        $seller = Seller::whereRaw("BINARY seller_id = '$username'")->whereRaw("BINARY seller_pass = '$password'")->first();

        if($seller){

        $req->session()->put('username',$username);

        if($req->remember){
            setcookie('uname',$req->username, time()+20);
            setcookie('pass',$req->pass, time()+20);
            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');

        }else{

            return 'Invalid username or password ' . $password;

        }




    }

    public function dashboard(){

        return view('Seller.dashboard');
    }

    public function logout() {

        session()->forget('username');
        return redirect()->route('login');
    }

    public function loadProfile(Request $req) {

        $seller=Seller::where('seller_id',session('username'))->first();

        return view('Seller.profile')->with('seller',$seller);


    }

    public function editProfile(){

        $seller=Seller::where('seller_id',session('username'))->first();

        return view('Seller.edit_profile')->with('seller',$seller);

    }

    public function updateProfile(Request $req) {

        $req->validate([
            'pass'=>'required|max:15|alpha_num',
            'mail'=>'required|email:rfc',
            'name'=>'required',
        ]);

        $seller=Seller::where('seller_id',$req->s_id)->first();
        $seller->seller_name=$req->name;
        $seller->seller_email=$req->mail;
        $seller->seller_pass=$req->pass;
        $seller->save();

        return redirect()->route('profile');




    }
}
