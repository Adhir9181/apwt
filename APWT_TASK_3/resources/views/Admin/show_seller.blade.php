@extends('layouts.admin_dash')
@section('content')
<div class="container">
    <div style="text-align:center;">

        <h3>Seller's Profile</h3>

        <br>




       <p class="h4"> Name : {{ $seller->seller_name }} </p>
       <p class="h4">Email : {{ $seller->seller_email}}</p>


    </div>
</div>
@endsection
