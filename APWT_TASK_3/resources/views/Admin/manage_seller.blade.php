@extends('layouts.admin_dash')
@section('content')
<div class="container">
<div style="text-align:center;">
    <h4>Manage Sellers</h4>
    <small>As an admin you can modify the users</small>
</div><br>
<table class="table table-bordered">
    <tr class="table-primary">
    <th class="table-primary">Seller ID</th>
    <th class="table-primary">Seller Name</th>
    <th class="table-primary">Seller Email</th>
    <th class="table-primary"></th>
    <th class="table-primary"></th>
    <th class="table-primary"></th>
</tr>
@foreach($sellers as $seller)
<tr class="table-info">
<td >{{ $seller->seller_id }}</td>
<td >{{ $seller->seller_name }}</td>
<td >{{ $seller->seller_email }}</td>
<td ><a href="/d-{{ $seller->seller_id }}" class="btn btn-info">View</a></td>
<td ><a href="/dE-{{ $seller->seller_id }}" class="btn btn-warning">Edit</a></td>
<td ><a href="/dD-{{ $seller->seller_id }}" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
</table>
</div>
@endsection
