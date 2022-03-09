@extends('layouts.dashboard-template')

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row">
        <h4 class="col-10">Update Event</h4>
        <a href="/admin/event" title="Back to Event list" class="btn btn-primary float-end col-2"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('event.update', $data->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" autocomplete="off" value="{{ $data->title }}" id="voucher_title" name="title" required placeholder="Voucher Title">
        </div>
        <div class="mb-3">
          <label for="date" class="form-label">Expired Voucher</label>
          <input type="date" class="form-control" autocomplete="off" value="{{ date('Y-m-d',strtotime($data->expired_voucher))}}" id="date" name="expired_voucher" required>
        </div>
        <div class="mb-5">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" value="{{ $data->description }}" id="description" cols="10" class="form-control" rows="3" placeholder="Voucher Description" >{{ $data->description }}</textarea>
        </div>
        <div class="mb-3 mt-2">
          <center>
            <input type="reset" class="btn btn-danger" value="Reset Form"></a>
            <input type="submit" class="btn btn-primary" value="Submit">
          </center>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal --}}
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
            <td>Title</td>
            <td>: </td>
            <td class="fw-bold">Shoping Voucher</td>
          </tr>
          <tr>
            <td>Expired Voucher</td>
            <td>:</td>
            <td class="fw-bold">12 - 09 - 2022</td>
          </tr>
          <tr>
            <td>Description</td>
            <td>:</td>
            <td class="fw-bold">Lorem ipsum dolor sit amet consectetur.</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection