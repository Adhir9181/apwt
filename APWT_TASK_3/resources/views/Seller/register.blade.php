@extends('layouts.app')
@section('content')
<div class="container">
    @if(!empty($msg))
    <div class="alert alert-info">
        {{ $msg }}
    </div>
    @endif
    <div style="text-align:center;">
        <h4>Medicine Seller Registration Form</h4>
        <small>Please Fill up this form correctly</small>
    </div><br>
<form action="{{ route('registerSubmit') }}" method="post" class="row g-3" enctype="multipart/form-data">
    @csrf


      <div class="col-12">
        <br>
        <label  class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full Name"><span class="text-danger">
            @error('name'){{$message}}@enderror
        </span>
      </div>
      <br>
      <div class="col-md-6">
        <br>
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="inputPassword4"><span class="text-danger">
            @error('pass'){{$message}}@enderror
        </span>
      </div>
      <div class="col-12">
        <br>
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="mail" placeholder="Email"><span class="text-danger">
            @error('mail'){{$message}}@enderror
        </span>
      </div>
      <div class="col-12">
          <br>
        <input type="submit" value="Register" class="btn btn-primary"> <br>

      </div>
</form>
</div>
@endsection
