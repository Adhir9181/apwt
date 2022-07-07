<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Seller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Admin.login');
    }

    public function adminlogin(Request $req){

        $req->validate([
            'username'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->username;
        $password = $req->pass;

        $admin = Admin::whereRaw("BINARY admin_username = '$username'")->whereRaw("BINARY admin_pass = '$password'")->first();

        if($admin){

        $req->session()->put('admin_username',$username);
        if($req->remember){
            setcookie('uname',$req->username, time()+20);
            setcookie('pass',$req->pass, time()+20);
            return redirect()->route('admin_dashboard');
        }


        return redirect()->route('admin_dashboard');

        }else{

            return 'Invalid username or password ' . $password;

        }


    }

    public function logout() {

        session()->forget('admin_username');
        return redirect()->route('admin_login');
    }

    public function dashboard(){

        return view('Admin.dashboard');
    }

    public function seller_reg(){
         if(Session::has('msg'))
    {
      $success_msg = session()->get('msg');
      session()->forget('msg');
      return view('Admin.create_seller')->with('msg', $success_msg);
    }
        return view('Admin.create_seller');
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



        return redirect()->route('create_seller')->with([ 'msg' => "Registration Completed!. Your ID is : ".$user_id ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    public function showUsers(){

        $seller=Seller::all();
        return view('Admin.manage_seller')->with('sellers',$seller);
    }

    public function showUser(Request $req){

        $seller = Seller::where('seller_id',$req->id)->first();

        return view('Admin.show_seller')->with('seller',$seller);

    }

    public function editUser(Request $req){

        $seller = Seller::where('seller_id',$req->id)->first();

        return view('Admin.edit_seller')->with('seller',$seller);

    }

    public function deleteUser(Request $req){

        $seller = Seller::where('seller_id',$req->id)->first();
        $seller->delete();
        return redirect()->route('manage_sellers');

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

        return redirect()->route('manage_sellers');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
