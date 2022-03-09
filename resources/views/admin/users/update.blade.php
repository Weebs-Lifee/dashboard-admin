@extends('layouts.dashboard-template')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-10">Update User</h4>
        <a href="/admin/users" title="Back to User list" class="btn btn-primary float-end col-2"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('users.update', $data->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" autocomplete="off" value="{{ $data->name }}" id="name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" autocomplete="off" id="email" value="{{ $data->email }}" name="email" required>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label for="my-select">Role</label>
            <select id="my-select" class="form-control" name="role">
              <option value="Admin" {{ $data->role === 'Admin' ? 'selected' : '' }}>Admin</option>
              <option value="Kasir" {{ $data->role === 'Kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <center>
            <input type="reset" class="btn btn-danger" value="Reset Form">
            <input type="submit" class="btn btn-primary" value="Submit">
          </center>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection