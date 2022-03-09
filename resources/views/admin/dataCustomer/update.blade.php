@extends('layouts.dashboard-template')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-10">Update Data Customer</h4>
        <a href="/admin/dataCustomer" title="Back to Data Customer" class="btn btn-primary float-end col-2"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('dataCustomer.update', $data->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" autocomplete="off" id="name" name="name" required placeholder="Voucher Name" value="{{ $data->name }}">
        </div>
        <div class="mb-3">
          <label for="phone_number" class="form-label">No. Whatsapp</label>
          <input type="number" class="form-control" autocomplete="off" id="phone_number" name="no_wa" placeholder="example: 62121219224" required value="{{ $data->no_wa }}">
        </div>
        <label for="">Choose your Gender</label>
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" class="radio" {{ $data->gender === 'Male' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDefault1" >
              Male
            </label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" {{ $data->gender === 'Female' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDefault2">
              Female
            </label>
          </div>
        </div>
        <div class="mb-3 mt-2">
          <center>
            <input type="reset" class="btn btn-danger" value="Reset Form">
            <input type="submit" class="btn btn-primary" value="Submit">
          </center>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Confirmation
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table>
          <tr>
            <td>Name</td>
            <td>: </td>
            <td class="fw-bold">Example Name</td>
          </tr>
          <tr>
            <td>No. Whatsapp</td>
            <td>:</td>
            <td class="fw-bold">62121219224</td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>:</td>
            <td class="fw-bold">Male</td>
          </tr>
        </table>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection