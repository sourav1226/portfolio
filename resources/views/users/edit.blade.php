@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add User</h1>
    <form>
        <div class="form-group">
        
            <input type="Name" class="form-control" placeholder="Enter Name">
       
          </div>
        <div class="form-group">
        
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
     
        </div>
        <div class="form-group">
        
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
@endsection
