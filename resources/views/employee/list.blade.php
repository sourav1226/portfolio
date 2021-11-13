@extends('layouts.master')
@section('styles')
 <style>
   
</style>   
@endsection

@section('title') {{'User List'}}
    
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div style="display: flex; justify-content: space-between;" class="mb-2"> 
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <button type="button" class="btn btn-primary"> <a href="{{route('add')}}" style="text-decoration: none; color:#fff;">Add User</a>
           </button>
    </div>
 
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    
                   
                </table>
            </div>
        </div>
    </div>

</div>
    
@endsection

@section('scripts')
<script src="{{asset('admin/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('admin/js/dataTables-demo.js')}}"></script>
    
@endsection