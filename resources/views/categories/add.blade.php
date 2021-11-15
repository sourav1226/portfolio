@extends('layouts.master')
@section('title') {{'Add category'}}@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div style="display: flex; justify-content: space-between" class="mb-2">
        <h1 class="h3 mb-2 text-gray-800">Add Category</h1>
        <button type="button" class="btn btn-primary"><a href="{{route('categories.index')}}"
                style="text-decoration: none; color: #fff;">Back</a>
        </button>
    </div>
    <form method="POST" action="{{route('categories.store')}}">
        @csrf
        <div class="form-group">

            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name"
                id="exampleName" name="name" value="{{old('name')}}">
            @error('name')
            {{$message}}
            @enderror

        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
