@extends('layouts.master')
@section('title') {{'Project List'}}@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div style="display: flex; justify-content: space-between" class="mb-2">
        <h1 class="h3 mb-2 text-gray-800">Projects</h1>
        <button type="button" class="btn btn-primary"><a href="{{route('projects.create')}}"
                style="text-decoration: none; color: #fff;">Add Project</a>
        </button>

    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Website</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                    <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->cat_id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->url}}</td>
                            <td>{{$project->description}}</td>
                            <td>{{$project->image}}</td>
                            <td>{{$project->status}}</td>
                            <td style="display: flex; gap: calc(5px + 1vmin);">
                                <button type="button" class="btn btn-primary"> <a
                                        href="{{route('projects.edit',['project'=>$project->id])}}"
                                        style="text-decoration: none; color: #fff;">Edit</a>
                                </button>
                                <form method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>

                                </form>
                            </td>
                        </tr>
                      @endforeach

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
