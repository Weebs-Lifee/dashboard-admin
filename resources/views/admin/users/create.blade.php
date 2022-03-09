@extends('layouts.dashboard-template')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-md-10">Create New User</h4>
        <a href="/admin/users" title="Add New User" class="btn btn-primary float-end col-md-2"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('users.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" id="name" name="name" required value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" id="email" name="email" required value="{{ old('email') }}">
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <div class="form-group">
          <label for="my-select">Role</label>
          <select id="my-select" class="form-control @error('role') is-invalid @enderror" name="role" required>
            <option selected>- Choose Role -</option>
            <option value="Admin">Admin</option>
            <option value="Kasir">Kasir</option>
          </select>
          @error('role')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
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
@endsection