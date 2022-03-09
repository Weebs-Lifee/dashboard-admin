@extends('layouts.dashboard-template')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-md-10">List Event</h4>
        <a href="{{ route('event.create') }}" title="Add New Event" class="btn btn-primary col-md-2"><i class="fas fa-plus"></i> Add New Event</a>
      </div>

      {{-- Alert Condition --}}
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
      @if(session()->has('update'))
        <div class="alert alert-success" role="alert">
          {{ session('update') }}
        </div>
      @endif
      
    </div>
    <div class="card-body">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center col-md-1">#</th>
                <th class="text-center col-md-3">Title</th>
                <th class="text-center col-md-2">Expired Voucher</th>
                <th class="text-center col-md-4">Description</th>
                <th class="text-center col-md-2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $event)
              <tr>
                <td class="text-center">{{ $event->id }}</td>
                <td class="text-center">{{ $event['title'] }}</td>
                <td class="text-center">{{ date('Y-m-d',strtotime($event->expired_voucher)) }}</td>
                <td class="text-center">{{ $event['description'] }}</td>
                <td class="text-center">
                  <form action="{{ route('event.destroy', $event->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <a href="{{ url('admin/event/'.$event->id.'/edit') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-pencil"></i></a>
                    <button type="submit" class="btn btn-outline-danger btn-sm onclick="return confirm('Are you sure?')""><i class="fa fa-trash"></i></button>
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

</div>
<!-- /.container-fluid -->  
@endsection