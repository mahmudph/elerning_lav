@extends('layouts/app_admin')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
          <div class="float-right">
               <button class="btn btn-sm btn-info" id="tambah" data-toggle='modal' data-target='#modalContent'>Tambah</button>
          </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="10px">No</th>
              <th>Nama Kelas</th>
              <th>Nama Guru</th>
              <th>Nama Pelajaran </th>
              <th width="100px">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('admin.newpengajaran.ajax')
    @include('admin.newpengajaran.datatables')
@endpush

