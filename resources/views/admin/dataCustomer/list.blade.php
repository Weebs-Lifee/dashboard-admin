@extends('layouts.dashboard-template')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-md-9">List Customer Data</h4>
        <a href="{{ route('dataCustomer.create') }}" title="Add New Customer" class="btn btn-primary float-end col-md-3"><i class="fas fa-plus"></i> Add New Customer</a>
      </div>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if(session()->has('update'))
      <div class="alert alert-success" role="alert">
        {{ session('update') }}
      </div>
    @endif
    
    @if(session()->has('delete'))
      <div class="alert alert-danger" role="alert">
        {{ session('delete') }}
      </div>
    @endif

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center col-md-1">#</th>
              <th class="text-center col-md-2">Name</th>
              <th class="text-center col-md-3">No. Whatsapp</th>
              <th class="text-center col-md-2">Gender</th>
              <th class="text-center col-md-2">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $customer)
              
            <tr>
              <td class="text-center">{{ $customer->id }}</td>
              <td class="text-center">{{ $customer->name }}</td>
              <td class="text-center">{{ $customer->no_wa }}</td>
              <td class="text-center">{{ $customer->gender }}</td>
              <td class="text-center">
                <form action="{{ route('dataCustomer.destroy', $customer->id) }}" method="post">
                  @csrf
                  @method("DELETE")
                  <a href="{{ url('admin/dataCustomer/'.$customer->id.'/edit') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
                  <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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