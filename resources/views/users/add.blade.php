@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Edit</h1>
    <form method="POST" action="{{route('users.store')}}">
        @csrf
        <div class="form-group">
        
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" id="exampleName" name="name" value="{{old('name')}}">
            @error('name')
                {{$message}}
            @enderror
       
          </div>
        <div class="form-group">
        
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
          @error('email')
          {{$message}}
      @enderror
     
        </div>

        <div class="form-group">
        
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="password" value="">
            @error('password')
            {{$message}}
        @enderror
       
          </div>
        {{-- <div class="form-group">
        
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      </div>
@endsection
