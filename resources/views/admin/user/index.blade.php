@extends('layouts/app_admin')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
        <button class="btn btn-sm btn-info float-right" id="tambah" data-toggle='modal' data-target='#modalContent'>Tambah</button>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="10px">No</th>
              <th>Username</th>
              <th>Email</th>
              <th>Password</th>
              <th>Role</th>
              <th width="50px">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('admin.user.ajax')
    @include('admin.user.datatables')
@endpush

