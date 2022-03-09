@extends('layouts.dashboard-template')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-md-10">Create New Customer</h4>
        <a href="/admin/dataCustomer" title="Back to Customer List" class="btn btn-primary float-end col-md-2"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('dataCustomer.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" autocomplete="off" id="name" name="name" required placeholder="Customer Name" autofocus>
        </div>  
        <div class="mb-3">
          <label for="phone_number" class="form-label">No. Whatsapp</label>
          <input type="number" class="form-control" autocomplete="off" id="phone_number" name="no_wa" placeholder="example: 62121219224" required>
        </div>
        <label for="">Choose your Gender</label>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Male
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">
            Female
          </label>
        </div>
        <div class="mb-3 mt-2">
          <center>
            <input type="reset" class="btn btn-danger" value="Reset Form"></a>
            <input type="submit" class="btn btn-primary" value="Submit"></a>
          </center>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection