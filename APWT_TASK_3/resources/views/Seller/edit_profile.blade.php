@extends('layouts.dash')
@section('content')
<div class="container">
    <div style="text-align:center;">
        <h4>Edit Seller's Profile</h4>
        <small>Not all given informations can be edited</small>
    </div><br>
<form action="{{ route('updateProfile') }}" method="post" class="row g-3" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="s_id" value="{{ $seller->seller_id }}">

      <div class="col-6">

        <label  class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ $seller->seller_name }}"><span class="text-danger">
            @error('name'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">

        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="inputPassword4" value="{{ $seller->seller_pass }}"><span class="text-danger">
            @error('pass'){{$message}}@enderror
        </span>
      </div>
      <div class="col-md-6">
        <br>
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="mail" placeholder="Email" value="{{ $seller->seller_email }}"<span class="text-danger">
            @error('mail'){{$message}}@enderror
        </span>
      </div> <br> <br>
    <div class="col-6" style="padding-left:260px">
        <br> <br>

        <input type="submit" value="Edit" class="btn btn-primary"> <br>

      </div><br>

</form>
</div>
@endsection
