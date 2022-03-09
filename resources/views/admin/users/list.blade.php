@extends('layouts.dashboard-template')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-md-10">List User</h4>
        <a href="{{ route('users.create') }}" title="Add New User" class="btn btn-primary float-end col-md-2"><i class="fas fa-plus"></i> Add New User</a>
      </div>
      <div class="mt-4">
        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session()->has('update'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('update') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if(session()->has('delete'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $user)
            <tr>
              <td class="text-center">{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td class="text-center">
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
                  <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash"></i></button>
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
<!-- /.container-fluid -->  
@endsection