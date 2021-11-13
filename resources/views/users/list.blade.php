@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div style="display: flex; justify-content: space-between" class="mb-2">
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    <button type="button" class="btn btn-primary"><a href="{{route('users.create')}}" style="text-decoration: none; color: #fff;">Add User</a>
     </button>

    </div>
    

    {{-- Message --}}
    @if (session('success'))
    <span class="text-success">{{session('success')}}</span>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
       <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button type="button" class="btn btn-primary"> <a href="{{route('users.index')}}"></a>
                                    Edit</button>
                                <button type="button" class="btn btn-danger"><a href="{{route('users.destroy')}}"></a>
                                    Delete</button>
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
