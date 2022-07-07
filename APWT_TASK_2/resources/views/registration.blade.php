@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('formSubmitted')}}" method="post" class="form-group" >
        @csrf
        Username<br>
        <input type="text" name="username" id="" class="form-control" placeholder="Username"><span class="text-danger">
            @error('username'){{$message}}@enderror
            </span><br>
        Email<br>
        <input type="text" name="mail" id="" class="form-control" placeholder="Email"><span class="text-danger">
            @error('mail'){{$message}}@enderror
            </span><br><br>
        Password<br>
        <input type="password" name="pass" id="" class="form-control"><span class="text-danger">
            @error('pass'){{$message}}@enderror
            </span><br><br>
        <input type="submit" value="Register" class="btn btn-primary"><br>
    </form>
</div>
@endsection
