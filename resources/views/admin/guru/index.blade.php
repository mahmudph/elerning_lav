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
              <th>No</th>
              <th>Nama</th>
              <th>Nip</th>
              <th>Gender</th>
              <th>Nomer Hp</th>
              <th>Tanggal Lahir</th>
              <th>Tempat Lahir</th>
              <th>Alamat</th>
              <th>Lulusan</th>
              <th width="50px">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('admin.guru.ajax')
    @include('admin.guru.datatables')

    <script>
      $(document).ready(function() {
        getDataTablesGuru();
      })
    </script>
@endpush

