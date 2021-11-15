@extends('layouts.master')
@section('title') {{'Add User'}}@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div style="display: flex; justify-content: space-between" class="mb-2">
        <h1 class="h3 mb-2 text-gray-800">Add User</h1>
        <button type="button" class="btn btn-primary"><a href="{{route('projects.index')}}"
                style="text-decoration: none; color: #fff;">Back</a>
        </button>
    </div>
    <form method="POST" action="{{route('projects.store')}}">
        @csrf
        <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter Project Name" id="exampleName" name="name" value="{{old('name')}}">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="col">
                        <select class="form-select" aria-label="Default select example" name="cat_id">
                        <option value="">Chooes Category</option>
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">

                <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="Enter URL" name="url"
                    id="exampleUrl" name="url" value="{{old('url')}}">
                @error('url')
                {{$message}}
                @enderror

            </div>
            <div class="form-group">

                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Descripton" name="description"></textarea>
            </div>
          
        
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="cat_id">
                <option value="">Chooes Status</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
            </div>

           
            <div class="form-group">

                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

            </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
